<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyLink extends Model
{
    protected $fillable = [
        'user_id',
        'twitter_urls',
        'instagram_url',
        'youtube_url',
        'pinterest_url',
        'whatsapp_url_or_number',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
