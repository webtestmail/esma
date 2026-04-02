<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickModules extends Model
{
    use HasFactory;

    protected $table = 'quick_modules';

    protected $fillable = [
        'position_order',
        'roles',
        'headline',
        'description',
        'image',
        'button_name',
        'button_link',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'position_order' => 'integer',
        'roles' => 'array',
        'headline' => 'string',
        'description' => 'string',
        'image' => 'string',
        'button_name' => 'string',
        'button_link' => 'string',
        'status' => 'string',
    ];
}
