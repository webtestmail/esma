<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['campagin_id','user_id','razorpay_order_id','paymentId','amount','status','type','method','description','transaction_title'];
    
    public function campagin(){
        return $this->belongsTo(Campagin::class,'campagin_id');
    }
    public function wallet(){
        return $this->belongsTo(Wallet::class,'wallet_id');
    }
}
