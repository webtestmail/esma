<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        
        'user_id',
        'company_name',
        'slug',
        'slogan',
        'company_type',
        'number_of_employees',
        'company_description',
        'about',
        'is_active',
        ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
