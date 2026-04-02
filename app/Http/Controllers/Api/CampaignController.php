<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campagin;
use App\Models\Product;
use App\Models\TargetAudience;
use App\Models\ActivityLog;
use App\Models\Deliverable;
use DB;

class CampaignController extends Controller
{
    public function campaigns_create(Request $request) {
    $user = Auth::user();
    
    // 1. Validation (Always validate before processing)
    $request->validate([
        'campaignBudget' => 'required|numeric|min:1',
        'campaignImage' => 'image|max:2048',
        'productSamples.*' => 'image|max:2048'
    ]);

    // 2. Pre-calculate deduction
    $taxRate = 0.18; 
    $serviceFee = 500;
    $totalDeduction = $request->campaignBudget + $serviceFee + ($request->campaignBudget * $taxRate);

    if($user->wallet->balance < $totalDeduction){
        return response()->json(['success' => false, 'message' => 'Insufficient Balance for budget + fees']);
    }

    // 3. Start Transaction
    return DB::transaction(function () use ($request, $user, $totalDeduction) {
        
        // Handle Campaign Image
        $campaignPath = $request->hasFile('campaignImage') 
            ? $request->file('campaignImage')->store('campaigns', 'public') 
            : null;

        // Create Campaign
        $campaign = Campagin::create([
            'user_id'              => $user->id,
            'title'                => $request->campaignTitle,
            'location'             => $request->campaignLocation,
            'campagin_type'        => $request->campaignType,
            'campaign_image'       => $campaignPath,
            'campagin_budget'      => $request->campaignBudget,
            'campagin_description' => $request->campaignDescription,
            'status'               => 'pending',
            'is_active'            => 0
        ]);

        // Create Deliverables
        Deliverable::create([
            'campagin_id'                    => $campaign->id,
            'reels'                          => $request->deliverables['reel'] ?? 0,
            'posts'                          => $request->deliverables['post'] ?? 0,
            'stories'                        => $request->deliverables['story'] ?? 0,
            'number_of_influencers_required' => $request->influencerCount,
            'cost_per_influencer'            => $request->costPerInfluencer ?? 0,
            'minimum_engagement_rate'        => $request->minEngagement,
            'minimum_followers_required'     => $request->minFollowers,
        ]);

        // Handle Product
        $productPath = $request->hasFile('productImage') 
            ? $request->file('productImage')->store('products', 'public') 
            : null;

        $product = Product::create([
            'campagin_id'      => $campaign->id,
            'title'            => $request->productName,
            'price'            => $request->productPrice,
            'description'      => $request->productDescription,
            'product_quantity' => $request->productQuantity,
            'product_link'     => $request->productLink,
            'product_image'    => $productPath,
        ]);

        // Handle Audience
        $categories = $request->input('influencerCategory');
        TargetAudience::create([
            'campagin_id'          => $campaign->id,
            'influencer_category'  => is_array($categories) ? implode(',', $categories) : $categories,
            'target_gender'        => $request->targetGender,
            'target_age_group'     => $request->targetAge,
        ]);

        // Handle Async Image Processing
        if ($request->hasFile('productSamples')) {
            $paths = [];
            foreach ($request->file('productSamples') as $file) {
                $paths[] = $file->store('tmp', 'public');
            }
            ProcessCampaignImages::dispatch($campaign->id, $product->id, $paths);
        }

        // Deduct Balance
        $user->wallet->decrement('balance', $totalDeduction);

        // Log Activity
        ActivityLog::create([
            'user_id'     => $user->id,
            'type'        => 'campagin_created',
            'title'       => 'New Campaign Created',
            'description' => "{$campaign->title} published. Charged " . number_format($totalDeduction, 2),
            'status_label'=> 'Pending',
            'metadata'    => ['budget' => $campaign->campagin_budget]
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Campaign created successfully',
            'data'    => ['campaign' => $campaign],
        ], 200);
    });
}
    
    public function get_campaign_data(){
        $user = Auth::user();
        
        
        $campaigns = Campagin::with(['targetAudience','order','application','product','deliverable'])->where('user_id',$user->id)->get();
        
        if(!$campaigns->count() < 0){
            return response()->json([
            'data'=> [
                'success'=>false,
                'message'=> 'Campaign not found for this user.',
                ],
            ],404);
        }
        
        return response()->json([
            
            'data'=> [
                'campaigns'=>$campaigns,
                'success'=>true,
                'message'=> 'Campaign data fetched succesfully',
                ],
            ],200);
    }
}
