<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Plan;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use \App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function razorpay_create_subscription(Request $request) {
    $request->validate([
        'plan_id' => 'required|exists:plans,id',
    ]);

    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    try {
        $plan = Plan::findOrFail($request->plan_id);

        $subscription = $api->subscription->create([
            'plan_id' => $plan->razorpay_plan_id,
            'customer_notify' => 1,
            'total_count' => (int)($plan->billing_cycle ?? 1),
        ]);

        $localSubscription = Subscription::updateOrCreate(
            ['razorpay_subscription_id' => $subscription->id],
            [
                'user_id' => auth()->id() ?? $request->user_id, // Fallback for testing
                'plan_id' => $plan->id,
                'status'  => 'created', 
                'subscription_payment_type' => 'recurring', 
            ]
        );

        return response()->json([
            'success' => true,
            'subscription_id' => $subscription->id,
            'razorpay_key' => env('RAZORPAY_KEY'),
            'amount' => $plan->price, 
            'name' => $plan->name
        ], 200);

    } catch (\Exception $e) {
        Log::error('Razorpay Subscription Error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'error' => 'Could not create subscription. ' . $e->getMessage()
        ], 500);
    }
}

    public function verifySubscription(Request $request) 
    {
        
        $validator = Validator::make($request->all(), [
            'razorpay_subscription_id' => 'required|string',
            'razorpay_payment_id'      => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
    
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    
        try {
         
            $attributes = [
                'razorpay_subscription_id' => $request->razorpay_subscription_id,
                'razorpay_payment_id'      => $request->razorpay_payment_id,
                'razorpay_signature'       => $request->razorpay_signature
            ];
            
             $api->utility->verifyPaymentSignature($attributes);
    
            // 3. User & DB Sync
            $user = auth()->user(); // Works with Sanctum/Passport Bearer tokens
    
            return DB::transaction(function () use ($api, $user, $request) {
                
                // 4. Handle Upgrade/Old Subscriptions
                $oldSubscription = \App\Models\Subscription::where('user_id', $user->id)
                    ->where('status', 'active')
                    ->first();
    
                if ($oldSubscription) {
                    try {
                        // Cancel old subscription at Razorpay
                        $api->subscription->fetch($oldSubscription->razorpay_subscription_id)->cancel([
                            'cancel_at_cycle_end' => 0 
                        ]);
    
                        $oldSubscription->update([
                            'status'      => 'upgraded',
                            'ends_at'     => now(),
                            'canceled_at' => now(),
                        ]);
                    } catch (\Exception $e) {
                        \Log::warning("Old Razorpay cancellation failed for User {$user->id}: " . $e->getMessage());
                    }
                }
    
                // 5. Fetch Payment Details
                $payment = $api->payment->fetch($request->razorpay_payment_id);
    
                // 6. Update New Subscription
                $subscription = \App\Models\Subscription::with('plan')
                    ->where('razorpay_subscription_id', $request->razorpay_subscription_id)
                    ->firstOrFail();
    
                $plan = $subscription->plan;
                $billing_cycle = $plan->billing_cycle;
    
                // Calculate End Date
                $endDate = ($plan->plan_price_base == 'monthly') 
                            ? now()->addMonths($billing_cycle) 
                            : now()->addYears($billing_cycle);
    
                $subscription->update([
                    'status'         => 'active',
                    'starts_at'      => now(),
                    'ends_at'        => $endDate,
                    'payment_method' => $payment->method ?? 'razorpay'
                ]);
    
                return response()->json([
                    'success' => true,
                    'message' => 'Subscription verified and activated successfully.',
                    'data'    => [
                        'subscription_id' => $subscription->id,
                        'status'          => $subscription->status,
                        'expiry'          => $subscription->ends_at->toDateTimeString()
                    ]
                ], 200);
            });
    
        } catch (SignatureVerificationError $e) {
            return response()->json(['success' => false, 'message' => 'Invalid payment signature.'], 403);
        } catch (\Exception $e) {
            \Log::error("Razorpay API Error: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Internal server error during verification.'], 500);
        }
    }
  
    public function get_plan_data(){
        $plans = Plan::where('status','active')->get();
        
        if($plans){
               return response()->json([
        'data' => [
            'success' => true,
            'message'=>'Plans data fatched successfully',
            'banks'=> $plans,
            ],
            ],200);
        }
        else{
               return response()->json([
        'data' => [
            'success' => false,
            'message'=>'Plans Not found',
            ],
            ],404);
        }
    }
}
