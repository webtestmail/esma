<?php


namespace App\Services;

use App\Models\Campagin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    protected $key;
    protected $secret;

    public function __construct($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->api = new Api($this->key, $this->secret);
    }

   public function generateLink(Campagin $campaign)
    {
        try {
           $baseAmount = 500;
            $gstRate = 0.18; // 18%
            
           
            $totalWithGst = $baseAmount * (1 + $gstRate);
            
            $amountInPaise = round($totalWithGst * 100);

         
            $paymentLink = $this->api->paymentLink->create([
            'amount' => $amountInPaise,
            'currency' => 'INR',
            'accept_partial' => false,
            'description' => "Payment for Campaign: " . $campaign->title,
            'customer' => [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'notify' => ['sms' => true, 'email' => true],
            'reminder_enable' => true,
            'notes' => ['campaign_id' => $campaign->id],
            'callback_url' => route('payment.callback'), 
            'callback_method' => 'get'
        ]);
            
            
            
            
            $order =Order::create([
                'campagin_id'=>$campaign->id,
                'razorpay_order_id' => $paymentLink['id'],
                'amount'=>$amountInPaise,
                'status'=>'Process'
            ]);
            
            return $paymentLink['short_url'];
            
            

        } catch (\Exception $e) {
            Log::error("Razorpay Order Creation Failed: " . $e->getMessage());
            return null;
        }
    }
}