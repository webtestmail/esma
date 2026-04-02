<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Campagin;
use App\Models\Deliverable;
use App\Models\Order;
use App\Models\Product;
use App\Models\PaymentRequest;
use App\Models\ActivityLog;
use App\Models\ProductImage;
use Razorpay\Api\Api;
use App\Models\TargetAudience;
use App\Services\PaymentService;

class BrandPaymentController extends Controller
{
    protected $paymentService;
    
    public function __construct(PaymentService $paymentService){
        $this->paymentservice = $paymentService;
    }
    


    public function withdrawRequest(Request $request)
    {
        $user = auth()->user();
        $wallet = $user->wallet;
        $amount = $request->amount;
    
        // 1. Check if user has enough balance
        if ($wallet->balance < $amount) {
            return response()->json([
                'success' => false, 
                'message' => 'Insufficient balance in wallet.'
            ], 400);
        }
    
        // 2. Create the PaymentRequest entry
        // We store as 'withdrawal' and 'pending'
        $paymentRequest = PaymentRequest::create([
            'user_id' => $user->id,
            'type' => 'withdrawal', // 'deposit' is default for add funds
            'amount' => $amount*100, // Store in Paise to maintain consistency
            'account_id' => $request->bank_name,
            'status' => 'Pending',
            'user_note' => $request->notes
        ]);
        
        $wallet->update([
            
            'balance' =>$wallet->balance-$amount,
        ]);
    
        // 3. Optional: Add to Activity Table
        ActivityLog::create([
            'user_id' => $user->id,
            'type' => 'withdrawal_request',
            'title' => 'Withdrawal Requested',
            'description' => "Requested ₹{$amount} to {$request->bank_name}",
            'status_label' => 'Pending',
            'metadata' => ['amount' => $amount]
        ]);
        
        $orders = Order::create([
            'user_id'=>$user->id,
            'type' => 'debit',
            'amount'=>$amount*100,
            'status'=>'Pending',
            'transaction_title'=>'Withdrawl Request',
            'description'=>"Withdrawal Request for Rs {$amount}",
            ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Request stored successfully'
        ]);
    }
    
    // STEP 1: Create the Razorpay Order
    public function wallet_create_order(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $amountInPaise = $request->amount * 100;

        $razorpayOrder = $api->order->create([
            'receipt'         => 'rcpt_' . time(),
            'amount'          => $amountInPaise,
            'currency'        => 'INR',
        ]);

        // Create a pending record in your orders table
        Order::create([
            'user_id' => Auth::id(),
            'razorpay_order_id' => $razorpayOrder['id'],
            'transaction_title'=> 'Wallet Top Up',
            'amount' => $amountInPaise,
            'status' => 'Pending',
            'type'=>'credit',
            'method' => $request->method // Store the user's preferred method
        ]);

        return response()->json([
            'order_id' => $razorpayOrder['id'],
            'razorpay_key' => env('RAZORPAY_KEY'),
            'amount' => $amountInPaise
        ]);
    }

    // STEP 2: Verify the Payment and Update Wallet
    public function verifyPayment(Request $request)
    {
        $order = Order::where('razorpay_order_id', $request->order_id)->first();

        if ($order && $order->status !== 'Success') {
            // In a real app, you should verify the signature here using Razorpay SDK
            
            // 1. Update Order
            $order->update([
                'paymentId'=>$request->payment_id,
                'status' => 'Completed',
                'payment_id' => $request->payment_id
            ]);

            // 2. Update Wallet Balance (Convert back to Rupees)
            $wallet = Auth::user()->wallet;
            $wallet->increment('balance', ($order->amount / 100));
           

            Log::info("Wallet Funded: User ID " . Auth::id() . " amount " . ($order->amount / 100));

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid Order'], 400);
    }


public function initiatePayment(Request $request, PaymentService $paymentService)
    {
        $userId = Auth::id();
        
        // Log::info('Campaign Initiation Started', ['user_id' => $userId, 'payload' => $request->all()]);
        
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
            'campagin_description'=>$request->campaignDescription,
            'status'         => 'pending',
        ]);
    
    
        $deliverable = Deliverable::create([
            'campagin_id'                    => $campaign->id,
            'reels'                          => $request->deliverables['reel'] ?? 0,
            'posts'                          => $request->deliverables['post'] ?? 0,
            'stories'                        => $request->deliverables['story'] ?? 0,
            'number_of_influencers_required' => $request->influencerCount,
            'cost_per_influencer'            => $request->costPerInfluencer,
            'minimum_engagement_rate'        => $request->minEngagement,
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
    
        $targetAudience = TargetAudience::create([
            'campagin_id'          => $campaign->id,
            'influencer_category'  => is_array($request->input('influencerCategory[]')) 
                                        ? implode(',', $request->input('influencerCategory[]')) 
                                        : $request->input('influencerCategory[]'),
            'campaign_description' => $request->campaignDescription,
            'target_gender'        => $request->targetGender,
            'target_age_group'     => $request->targetAge,
        ]);
    
        if ($request->hasFile('productSamples')) {
                foreach ($request->file('productSamples') as $sample) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image'      => $sample->store('samples', 'public'),
                        'is_active'  => 1,
                    ]);
                }
            }
    
    
        $paymentUrl = $paymentService->generateLink($campaign);
        
        if (!$paymentUrl) {
                return response()->json(['success' => false, 'message' => 'Payment link failed'], 500);
        }
        
        
        return response()->json([
            'success' => true,
            'checkout_url' => $paymentUrl 
        ]);
    }
    
    public function paymentCallback(Request $request)
{
    // Razorpay sends payment_id and order_id in the URL
    $paymentId = $request->get('razorpay_payment_id');
    $orderId = $request->get('razorpay_payment_link_id');
    $signature = $request->get('razorpay_signature');
    $status = $request->get('razorpay_payment_link_status');
   
    // 1. Find the order in your database
    $order = Order::where('razorpay_order_id', $orderId)->first();
    
   Log::info('Callback Received', [
        'plink_id' => $orderId,
        'status' => $status
    ]);

    if ($order && ($status === 'paid' || $status === 'processed')) {
        // 4. Update status
        $order->update([
            'status' => 'Success',
            'payment_id' => $paymentId
        ]);

        if ($order->campagin) {
            $order->campagin->update([
                'status' => 'active',
                'is_active' => true
            ]);
        }

        return redirect()->route('brand-campaigns')->with('success', 'Campaign published successfully!');
    }

    return redirect()->route('brand-campaigns')->with('error', 'Payment verification failed.');
}
}
