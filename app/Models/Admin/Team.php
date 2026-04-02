<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $fillable = [
        'position_order',
        'employee_name',
        'employee_designation',
        'employee_image',
        'instagram_count',
        'youtube_count',
        'tiktok_count',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'position_order' => 'integer',
        'employee_name' => 'string',
        'employee_designation' => 'string',
        'employee_image' => 'string',
        'instagram_count' => 'string',
        'youtube_count' => 'string',
        'tiktok_count' => 'string',
        'status' => 'string',
    ];
}
