<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServices extends Model
{
    use HasFactory;

    protected $table = 'subservices';

    protected $fillable = [
        'service_id',
        'parent_id',
        'position_order',
        'blog_ids',
        'service_template',
        'service_name',
        'service_url',
        'description',
        'service_image',
        'breadcrumb_headline',
        'breadcrumb_description',
        'button_name',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'visibility',
        'header_footer_visibility',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'parent_id' => 'integer',
        'position_order' => 'integer',
        'blog_ids' => 'array',
        'service_template' => 'string',
        'service_name' => 'string',
        'service_url' => 'string',
        'description' => 'string',
        'service_image' => 'string',
        'breadcrumb_headline' => 'string',
        'breadcrumb_description' => 'string',
        'button_name' => 'string',
        'meta_title' => 'string',
        'meta_keyword' => 'string',
        'meta_description' => 'string',
        'visibility' => 'string',
        'header_footer_visibility' => 'string',
        'status' => 'string',
    ];
}
