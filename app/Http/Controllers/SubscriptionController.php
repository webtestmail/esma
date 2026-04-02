<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Admin\Plan;
use App\Models\Feature;
use App\Models\FeaturePlan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    
    public function razorpay_create_subscription(Request $request){
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
     
      
        $plan = Plan::find($request->plan_id);
        
        
        try {
      
        $subscription = $api->subscription->create([
            'plan_id' => $plan->razorpay_plan_id,
            'customer_notify' => 1,
            'total_count' => $plan->billing_cycle ?? 1, // Number of billing cycles (e.g., 12 months)
        ]);

        \App\Models\Subscription::updateOrCreate(
            ['razorpay_subscription_id' => $subscription->id],
            [
                'user_id' => auth()->id(),
                'plan_id' => $plan->id,
                'status'  => 'created', 
                'subscription_payment_type' => 'recurring', 
            ]
        );

        return response()->json([
            'subscription_id' => $subscription->id,
            'razorpay_key' => env('RAZORPAY_KEY')
        ]);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
        
    }
    
    public function verifySubscription(Request $request) {
    $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    try {
        // 1. Verify the new signature
        $attributes = [
            'razorpay_subscription_id' => $request->razorpay_subscription_id,
            'razorpay_payment_id'      => $request->razorpay_payment_id,
            'razorpay_signature'       => $request->razorpay_signature
        ];
        $api->utility->verifyPaymentSignature($attributes);

        $user = Auth::user();

        $oldSubscription = \App\Models\Subscription::where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        if ($oldSubscription) {
            try {
                $api->subscription->fetch($oldSubscription->razorpay_subscription_id)->cancel([
                    'cancel_at_cycle_end' => 0 // 0 means cancel immediately
                ]);

                $oldSubscription->update([
                    'status' => 'upgraded',
                    'ends_at' => now(),
                    'canceled_at' =>now(),
                ]);
            } catch (\Exception $e) {
                // Log if cancellation fails but continue with the new activation
                \Log::warning("Old Razorpay cancellation failed: " . $e->getMessage());
            }
        }
        
        $payment = $api->payment->fetch($request->razorpay_payment_id);
        // 5. Activate the NEW subscription in your DB
    
        $subscription = \App\Models\Subscription::with('plan')->where('razorpay_subscription_id', $request->razorpay_subscription_id)
            ->firstOrFail();
        
        $subscription->update([
            'status'         => 'active',
            'starts_at'      => now(),
            'payment_method' => $payment->method ?? 'razorpay'
        ]);
        
        $plan = $subscription->plan; 
        $billing_cycle = $plan->billing_cycle; // e.g., 1, 3, 12
        
        // If it's yearly, you should probably add years or (12 * cycles).
        if($plan->plan_price_base == 'monthly') {
            $endDate = now()->addMonths($billing_cycle);
        } else {
            // If it's yearly, add years based on the cycle
            $endDate = now()->addYears($billing_cycle);
        }
        
        $subscription->update(['ends_at' => $endDate]);

        return response()->json(['status' => 'success']);

    } catch (\Exception $e) {
        \Log::error("Razorpay Verification Error: " . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => 'Verification failed'], 403);
    }
}
}
