<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturePlan extends Model
{
    protected $table = 'feature_plan';
    
    protected $fillable = ['plan_id','feature_id','value'];
    
    public function feature()
    {
        return $this->belongsTo(Feature::class, 'feature_id');
    }
    
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
