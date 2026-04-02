<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable =['user_id','type','title','description','status_label','metadata'];
    
    protected $casts = [
        'metadata' => 'json', // or 'array'
    ];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
