<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardFeatures extends Model
{
    use HasFactory;

    protected $table = 'dashboard_features';

    protected $fillable = [
        'position_order',
        'role',
        'i_tag',
        'feature_headline',
        'description',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'position_order' => 'integer',
        'role' => 'string',
        'i_tag' => 'string',
        'feature_headline' => 'string',
        'description' => 'string',
        'status' => 'string',
    ];
}
