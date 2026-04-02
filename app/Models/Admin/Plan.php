<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;

class Plan extends Model
{
    protected $fillable = ['user_category','razorpay_plan_id','name','price','currency','position_order','status','plan_price_base','button_name'];
    
        public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_plan', 'plan_id', 'feature_id')->withPivot('value');
    }
    
    public function subscription(){
        return $this->hasMany(Subscription::class,'plan_id');
    }
}
