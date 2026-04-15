<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
    protected $fillable = [
        'user_id',
        'company_logo',
        'company_cover_image',
        'display_cover_image',
        'promotional_banner',
        'promotional_banner_mobile',
        'promotional_banner_link'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
