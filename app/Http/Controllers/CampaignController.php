<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campagin;
use App\Models\Deliverable;
use App\Models\Product;
use App\Models\TargetAudience;
use App\Models\ProductImage;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Jobs\ProcessCampaignImages;
use App\Jobs\UpdateCampaginImages;
use App\Models\Message;
use App\Models\Application;
use App\Models\Order;
use Razorpay\Api\Api;

class CampaignController extends Controller
{
  public function markComplete(Request $request) {
   
   
    $application = Application::where('campagin_id',decrypt($request->campaign_id))
        ->where('influencer_id', decrypt($request->influencer_id))
        ->first();

    if (!$application) {
        return response()->json(['success' => false, 'message' => 'Application not found'], 404);
    }

   
    $application->update(['project_completed' => 'Completed']);

  
    $influencer = $application->influencer;
    if ($influencer) {
        $influencer->wallet()->increment('balance', $application->proposed_rate );
    }
   
    // 4. Check if the TOTAL campaign budget is exhausted
    $campaign = Campagin::find(decrypt($request->campaign_id));
    
    $campaign->increment('budget_allocated',$application->proposed_rate);
    
    $totalFinishedProposedRate = Application::where('campagin_id', $campaign->id)
        ->where('project_completed', 'Completed')
        ->sum('proposed_rate');

    // Compare total finished work against campaign budget
    if ($totalFinishedProposedRate >= $campaign->campagin_budget) {
        
        $campaign->update(['status' => 'Completed']);
        
        $activityLog= ActivityLog::create([
                'user_id'=>$campaign->user_id,
                'type'=>'campagin_application',
                'title'=>'Campagin Completed',
                'description'=> "Collaborator @{$campaign->user->username} compeleted {$campaign->title}",
                'status_label'=> 'Completed',
              ]);
        $activityLog= ActivityLog::create([
                'user_id'=>$influencer->id,
                'type'=>'campagin_payout',
                'title'=>'Payout Received',
                'description'=> "Rs {$application->proposed_rate} has been added to your wallet from {$campaign->user->userprofile->company_name}",
                'status_label'=> 'Completed',
                'metadata' => ['payout' => '+RS'.$application->proposed_rate]
              ]);
    }

    return response()->json(['success' => true]);
}
     public function updateWorkStatus(Request $request)
    {
        $request->validate([
            'message_id' => 'required',
            'status' => 'required|in:approved,rejected'
        ]);
    
        $message = Message::find($request->message_id);
        
        if (!$message) {
            return response()->json(['success' => false, 'message' => 'Message not found'], 404);
        }
    
        $message->work_status = $request->status;
        $message->save();
    
        // // OPTIONAL: If approved, you could trigger Escrow Release here
        // if ($request->status === 'approved') {
        //     // ReleasePaymentToInfluencer($message->campagin_id);
        // }
    
        return response()->json(['success' => true,'influencerId'=>encrypt($message->sender_id),'campaginId'=>encrypt($message->campagin_id)]);
    }   
    public function work_submit_send(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'receiver_id' => 'required',
            'campaign_id' => 'required',
            'message' => 'required|string',
            'type' => 'nullable|string' // standard 'text' or 'submission'
        ]);
    
        $receiverId = decrypt($request->receiver_id);
        $senderId = auth()->id();
        
        $campaginId = decrypt($request->campaign_id);
        
        // Create the message record
        $message = new Message();
        $message->campagin_id = $campaginId; 
        $message->sender_id = $senderId;
        $message->receiver_id = $receiverId;
        $message->message = $request->message;
        $message->type = $request->type ?? 'text'; // Save as 'submission'
        $message->payment_status = 'pending';
        $message->work_status ='Work Submitted';
        $message->save();
    
        // if ($request->type === 'submission') {
        //     \App\Models\Application::where('campagin_id', $request->campaign_id)
        //         ->where('influencer_id', $senderId)
        //         ->update(['work_status' => 'Work Submitted']);
        // }
    
        return response()->json(['success' => true]);
    }
    public function handlePaymentSuccess(Request $request) {
    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    
     $campaignId = decrypt($request->campaign_id);
    $influencer_id= decrypt($request->influencer_id);
    $campaign = Campagin::findOrFail($campaignId);
    
    Log::info('order id :'.$request->orderId);
    
    $order = Order::findOrFail($request->orderId);
    
        $user = Auth::user();
        
        $message = Message::create([
            'campagin_id' => $campaignId,
            'sender_id'=>$user->id,
            'receiver_id'=>$influencer_id,
            'payment_amount'=>$request->amount,
            'message' => 'Payment of ₹' . $request->amount . ' successful.',
            'razorpay_order_id' =>$request->razorpay_order_id,
            'type' => 'payment',
            'payment_status'=>'paid',
        ]);
        
       $payment = $api->payment->fetch($request->razorpay_payment_id);
       
       $order->update([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'status' => 'Success',
            'method' => $payment->method 
        ]);
            
         $activityLog= ActivityLog::create([
                'user_id'=>$user->id,
                'type'=>'campagin_application',
                'title'=>'Campagin Payout',
                'description'=> "Payment to @{$campaign->user->username} for {$campaign->title}",
                'status_label'=> 'Success',
              ]);
    
        
        if ($user->wallet) {
            $user->wallet->decrement('balance', $request->amount);
        }
        
       // $campaign->decrement('campagin_budget', $request->amount);
    
        return response()->json(['status' => 'success']);
    }
    public function payments_create_order(Request $request) {
        
        try {
            $campaignId = decrypt($request->campaign_id);
            
            Log::info('campagin id :'.$campaignId);
            
            $campaign = Campagin::findOrFail($campaignId);
            $amountInRupees = $request->amount;
            $user = auth()->user();
    
            // 1. Budget Check: Don't allow payment if it exceeds remaining budget
            if ($amountInRupees > $campaign->campagin_budget) {
                return response()->json([
                    'error' => true, 
                    'message' => 'Insufficient campaign budget. Remaining: ₹' . $campaign->campagin_budget
                ], 400);
            }
    
            // 2. Initialize Razorpay
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    
            // 3. Create Order (Amount must be in Paise: 1 INR = 100 Paise)
            $orderData = [
                'receipt'         => 'rcpt_' . time(),
                'amount'          => $amountInRupees * 100, 
                'currency'        => 'INR',
                'payment_capture' => 1 // Auto-capture
            ];
    
            $razorpayOrder = $api->order->create($orderData);
            

            
            $order = Order::create([
                'user_id'=>$user->id,
                'campagin_id'=>$campaignId,
                'amount'=>$amountInRupees*100,
                'type'=> 'debit',
                'razorpay_order_id'=>$razorpayOrder['id'],
                'transaction_title'=>"Campaign Payment - {$campaign->title}",
                'description'=>"Payment to @{$campaign->user->username} for {$campaign->title}",
                'status'=>'pending',
            
            ]);
            
            
            
             $activityLog= ActivityLog::create([
                'user_id'=>$user->id,
                'type'=>'campagin_application',
                'title'=>'Campagin Payout',
                'description'=> "Payment to @{$campaign->user->username} for {$campaign->title}",
                'status_label'=> 'pending',
              ]);
    
            return response()->json([
                'id' => $razorpayOrder['id'],
                'orderId'=>$order->id,
                'amount' => $razorpayOrder['amount']
            ]);
    
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
    
    public function messages_store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required',
            'message'     => 'required|string|max:1000',
            'campaign_id' => 'required', // Ensure campaign_id is also sent
        ]);
    
        try {
            // 1. Handle ID formatting (API sends plain IDs, Web might send encrypted)
            // If it's a number, use it directly. If not, try to decrypt it.
            $receiverId = is_numeric($request->receiver_id) 
                ? $request->receiver_id 
                : decrypt($request->receiver_id);
    
            $campaignId = is_numeric($request->campaign_id) 
                ? $request->campaign_id 
                : decrypt($request->campaign_id);
    
            // 2. Create the message
            $chat = Message::create([
                'sender_id'   => auth()->id(),
                'receiver_id' => $receiverId,
                'campagin_id' => $campaignId, // Note: your schema uses 'campagin_id'
                'message'     => $request->message,
                'type'        => 'text',
            ]);
    
           
            return response()->json([
                'status' => 'success', 
                'data'   => $chat->load('sender') // Load sender details for the UI
            ]);
    
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return response()->json(['status' => 'error', 'message' => 'Invalid ID format'], 400);
        } catch (\Exception $e) {
            \Log::error("Chat Error: " . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 500);
        }
    }
    public function get_messages(Request $request, $encrypted_id) 
    {
        try {
            $receiverId = decrypt($encrypted_id);
            $sendorId = auth()->id();
            
            $role = $request->role;
            
            // Log::info('receiver id :'.$receiverId);
            
            $campaignId = $request->campagin_id; 
            
            
            if (!is_numeric($campaignId)) {
                $campaignId = decrypt($campaignId);
                
                $campaign = Campagin::findOrFail($campaignId);
                $type = $campaign->campagin_type;
            }
    
                
            $messages = Message::where('campagin_id', $campaignId)
            ->where(function($q) use ($sendorId, $receiverId) {
                $q->where(function($sq) use ($sendorId, $receiverId) {
                    $sq->where('sender_id', $sendorId)->where('receiver_id', $receiverId);
                })->orWhere(function($sq) use ($sendorId, $receiverId) {
                    $sq->where('sender_id', $receiverId)->where('receiver_id', $sendorId);
                });
            })
            ->orderBy('created_at', 'asc')
            ->get();
            
            if($role == 'brand'){
                 $receiverId = $receiverId;
            }
            else{
                $receiverId = $sendorId;
            }
    
            $proposed_rate = Application::where('influencer_id', $receiverId)
                ->where('campagin_id', $campaignId)
                ->select('proposed_rate','project_completed')->first();
                
    
            return response()->json([
                'messages' => $messages->map(function($msg) use ($proposed_rate, $sendorId) {
                    return [
                        'text' => $msg->message,
                        'is_sender' => (int)$msg->sender_id === (int)$sendorId,
                        'type' => $msg->type ?? 'text',
                        'id'=>$msg->id,
                        
                        'work_status'=> $msg->work_status,
                        'payment_amount' => $proposed_rate->proposed_rate, 
                        'payment_status' => $msg->payment_status ?? 'pending',
                        'razorpay_order_id' => $msg->razorpay_order_id, //
                        'created_at_human' => $msg->created_at->format('g:i A')
                    ];
                }),
                'proposed_rate' => $proposed_rate,
                'campagin_type'=>$type,
                'project_completed'=> $proposed_rate->project_completed ?? 'Not Completed',
            ]);
    
        } catch (\Exception $e) {
            return response()->json(['messages' => [], 'error' => $e->getMessage()], 500);
        }
    }
    public function campaginStart($campaginId){
        $userId = Auth::id();
        $campagin = Campagin::findOrFail($campaginId);
        
        Log::info($campagin);
        
        $campagin->update([
            'status'=>'active',
            ]);
        
         $activityLog= ActivityLog::create([
            'user_id'=>$userId,
            'type'=>'campagin_updated',
            'title'=>'Campagin Updated',
            'description'=> $campagin->title.' campaign has been re startd',
            'status_label'=> $campagin->status,
            
            ]);
            
            $message = $campagin->status == 'active' ? 'Campagin re-started Successfully' : '';

    return response()->json([
        'status' => 'success',
        'message' => $message
    ]);
    }
    
    public function campaginPause($campaginId){
        $userId = Auth::id();
        $campagin = Campagin::findOrFail($campaginId);
        
        $campagin->update([
            'status'=>'paused',
            ]);
        
         $activityLog= ActivityLog::create([
            'user_id'=>$userId,
            'type'=>'campagin_updated',
            'title'=>'Campagin Updated',
            'description'=> $campagin->title.' campaign has been paused ',
            'status_label'=> $campagin->status,
            
            ]);
            
            $message = $campagin->status == 'paused' ? 'Campagin Paused Successfully' : '';

    return response()->json([
        'status' => 'success',
        'message' => $message
    ]);
    }
    
    public function brand_campaign_edit($id){
      $campagin_id= decrypt($id);
      $campagin= Campagin::findOrFail($campagin_id);
      
      if($campagin){
          return view('user-dashboard.brand.brand-campaign-edit',['campagin'=>$campagin]);
      }
      else{
          return back()->with('Campaign not found');
      }
    }
    
    public function campaigns_update(Request $request){
        $user = Auth::user();
        $userId = $user->id;
        
        $campaignData = Campagin::findOrFail($request->campagin_id);
        
       $campaignData = Campagin::find($request->campagin_id);
    if (!$campaignData) {
       
        return response()->json(['error' => true, 'message' => 'Campaign not found!']);
    }
        
         $campaignPath = null;
        if ($request->hasFile('campaignImage')) {
            if ($campaignData->campaign_image && Storage::disk('public')->exists($campaignData->campaign_image)) {
                    Storage::disk('public')->delete($campaignData->campaign_image);
                }
            $campaignPath = $request->file('campaignImage')->store('campaigns', 'public');
        }
        else{
            $campaignPath = $campaignData->campaign_image;
        }
        Log::info('Campaign description'.$request->campaignDescription);
                
           $campaignData->update([
            'title'           => $request->campaignTitle,
            'location'        => $request->campaignLocation,
            'campagin_type'   => $request->campaignType,
            'campaign_image'  => $campaignPath,
            'campagin_budget' => $request->campaignBudget,
            'campagin_description' => $request->campaignDescription,
        ]);
    
    
        $campaignData->deliverable->update([
        'reels'   => $request->deliverables['reel'] ?? 0,
        'posts'   => $request->deliverables['post'] ?? 0,
        'stories' => $request->deliverables['story'] ?? 0,
        'number_of_influencers_required' => $request->influencerCount,
        'cost_per_influencer'            => $request->costPerInfluencer,
        'minimum_engagement_rate'        => $request->minEngagement,
        'minimum_followers_required'     => $request->minFollowers,
    ]);
        
        $product = $campaignData->product;
        $productPath = $product->product_image;
        if ($request->hasFile('productImage')) {
            if ($productPath && Storage::disk('public')->exists($productPath)) {
                Storage::disk('public')->delete($productPath);
            }
            $productPath = $request->file('productImage')->store('products', 'public');
        }

    
        $product->update([
        'title'            => $request->productName,
        'price'            => $request->productPrice,
        'description'      => $request->productDescription,
        'product_quantity' => $request->productQuantity,
        'product_link'     => $request->productLink,
        'product_image'    => $productPath,
      ]);
        // Convert array to a comma-separated string
        $categories = $request->input('influencerCategory');
        $campaignData->targetAudience->update([
        'influencer_category'  => is_array($categories) ? $categories : [$categories],
        'campaign_description' => $request->campaignDescription,
        'target_gender'        => $request->targetGender,
        'target_age_group'     => $request->targetAge,
    ]);
    

    if ($request->hasFile('productSamples')) {
        $paths = [];
        foreach ($request->file('productSamples') as $file) {
            // Fast store in temporary location
            $paths[] = $file->store('tmp', 'public');
        }
        UpdateCampaginImages::dispatch($campaignData->id, $product->id, $paths);
    }
    
            
        //Activity Log
        
        $activityLog= ActivityLog::create([
            'user_id'=>$userId,
            'type'=>'campagin_updated',
            'title'=>'Campagin Updated',
            'description'=> $campaignData->title.' campaign has been updated and is now accepting applications',
            'status_label'=> $campaignData->status,
            'metadata' => ['budget' => $campaignData->campagin_budget]
            ]);
            
          return response()->json([
            'success' => true,'message'=>'Campagin Updated Successfully'
        ]);
        
        
    }
    
    public function campaigns_create(Request $request){
        $user = Auth::user();
        $userId = $user->id;
        
        if($user->wallet->balance < $request->campaignBudget){
            
            return response()->json(['success' => false, 'message' => 'Insufficient Balance']);
        }
        
        if(!$user->hasActiveSubscription()){
            return response()->json(['success' => false, 'message' => 'You have not subscribed plan']);
        }
        
       $activeSub = $user->hasActiveSubscription();
       
       Log::info('subcription detail :'.$activeSub);
        
       if ($activeSub) {
    // 1. Find the feature matching the 'campaign-limit' slug for the user's plan
        $campaignLimitFeature = \App\Models\FeaturePlan::where('plan_id', $activeSub->plan_id)
            ->whereHas('feature', function($query) {
                // Using the slug is safer than using the 'name' string
                $query->where('slug', 'up-to-5-campaigns') 
                      ->orWhere('slug', 'up_to_20_campaigns')
                      ->orWhere('slug', 'unlimited-campaigns');
            })->first();
    
        if ($campaignLimitFeature) {
            
            $numberOfCampaginsPosted = Campagin::where('user_id', $user->id)->count();
    
            $limit = $campaignLimitFeature->value;
    
            if ($limit !== null) {
                $limit = (int) $limit;
                if ($numberOfCampaginsPosted >= $limit) {
                    return response()->json([
                        'success' => false, 
                        'message' => "Limit reached! Your plan allows {$limit} campaigns. Please upgrade for more."
                    ]);
                }
            }
            // If $limit is NULL, it's unlimited; proceed as normal.
        }
     }
        
         $campaignPath = null;
        if ($request->hasFile('campaignImage')) {
            $campaignPath = $request->file('campaignImage')->store('campaigns', 'public');
        }
                
        $campaign = Campagin::create([
            'user_id'        => $userId,
            'title'          => $request->campaignTitle,
            'location'       => $request->campaignLocation,
            'campagin_type'  => $request->campaignType,
            'campaign_image' => $campaignPath,
            'campagin_budget'=> $request->campaignBudget ?? 0,
            'campagin_description'=>$request->campaignDescription,
            'status'         => 'pending',
        ]);
    
    
        $deliverable = Deliverable::create([
            'campagin_id'                    => $campaign->id,
            'reels'                          => $request->deliverables['reel'] ?? 0,
            'posts'                          => $request->deliverables['post'] ?? 0,
            'stories'                        => $request->deliverables['story'] ?? 0,
            'number_of_influencers_required' => $request->influencerCount,
            'cost_per_influencer'            => $request->costPerInfluencer ?? 0.00,
            'minimum_engagement_rate'        => $request->minEngagement,
            'minimum_followers_required'     => $request->minFollowers,
        ]);
        
        $productPath = null;
        if ($request->hasFile('productImage')) {
            $productPath = $request->file('productImage')->store('products', 'public');
        }

    
        $product = Product::create([
            'campagin_id'      => $campaign->id,
            'title'            => $request->productName,
            'price'            => $request->productPrice,
            'description'      => $request->productDescription,
            'product_quantity' => $request->productQuantity,
            'product_link'     => $request->productLink,
            'product_image'    => $productPath,
        ]);
        // Convert array to a comma-separated string
        $categories = $request->input('influencerCategory');
        $targetAudience = TargetAudience::create([
            'campagin_id'          => $campaign->id,
            'influencer_category'  => is_array($categories) ? implode(',', $categories) : $categories,
            'campaign_description' => $request->campaignDescription,
            'target_gender'        => $request->targetGender,
            'target_age_group'     => $request->targetAge,
        ]);
    

    if ($request->hasFile('productSamples')) {
        $paths = [];
        foreach ($request->file('productSamples') as $file) {
            // Fast store in temporary location
            $paths[] = $file->store('tmp', 'public');
        }
        ProcessCampaignImages::dispatch($campaign->id, $product->id, $paths);
    }
    
        $taxRate = 0.18; // 18% GST
        $serviceFee = 500;
        $budget = $campaign->campagin_budget ?? 0;
        
        // Total = Budget + 500 Fee + 18% of the Budget
        $totalDeduction = $budget + $serviceFee + ($budget * $taxRate);
        
        $user->wallet->update([
            'balance' => $user->wallet->balance - $totalDeduction,
        ]);
        
        //active campaign if process fine
        $campaign->update([
            'status'=>'pending',
            'is_active'=>0]);
        
            
        //Activity Log
        
        $activityLog= ActivityLog::create([
            'user_id'=>$userId,
            'type'=>'campagin_created',
            'title'=>'New Campagin Created',
            'description'=> "{$campaign->title} campaign has been published and also charged 500 + 18 GST is now accepting applications",
            'status_label'=> 'Pending',
            'metadata' => ['budget' => $campaign->campagin_budget]
            ]);
            
          return response()->json([
            'success' => true
        ]);
        
        
    }
    
    public function brand_campaign_detail($campaginId){
        $id = decrypt($campaginId);
        
        $campagin = Campagin::find($id);
        
        return view('user-dashboard.brand.brand-campaign-detail',['campagin'=>$campagin]);
        
    }
    public function brand_campaigns(){
        $id = Auth::id();
        $campagins = Campagin::withCount('application')->where('user_id',$id)->latest()->get();
        // $totalApplications = Campagin::withCount('application')->get();
        
        
        
        return view('user-dashboard.brand.brand-campaigns',['campagins'=>$campagins]);
    }
    
    public function brand_create_campaign(){
        
        return view('user-dashboard.brand.brand-create-campaign');
    }

}
