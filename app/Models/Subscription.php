<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Admin\Plan;

class Subscription extends Model
{
        protected $fillable = ['user_id','plan_id','razorpay_subscription_id','status','starts_at','ends_at','trial_ends_at','canceled_at','payment_method','subscription_payment_type'];

   public function scopeActive($query)
    {
        return $query->where('status', 'active')
                     ->where('ends_at', '>', Carbon::now());
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
        public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
    
    protected $casts = [
        'ends_at'   => 'datetime',
        ];
}
