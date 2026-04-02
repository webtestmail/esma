<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'reference_type',
        'position_order',
        'category_headline',
        'category_url',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'reference_type' => 'string',
        'position_order' => 'integer',
        'category_headline' => 'string',
        'category_url' => 'string',
        'meta_title' => 'string',
        'meta_keyword' => 'string',
        'meta_description' => 'string',
        'status' => 'string',
    ];
}
