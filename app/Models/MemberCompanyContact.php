<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCompanyContact extends Model
{
    protected $fillable = [
        'user_id',
        'main_address',
        'google_map_link',
        'country',
        'is_main',
        'is_active'
    ];

    
}
