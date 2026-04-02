<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['user_id', 'email', 'phone', 'company_name','contact_name','country', 'address', 'organization_type','website','message','status','approved_at'];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
