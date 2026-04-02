<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServiceSections extends Model
{
    use HasFactory;

    protected $table = 'subservice_sections';

    protected $fillable = [
        'service_id',
        'parent_id',
        'position_order',
        'section_headline',
        'description',
        'table_content',
        'footer_description',
        'section_image',
        'button_name',
        'button_link',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'parent_id' => 'integer',
        'position_order' => 'integer',
        'section_headline' => 'string',
        'description' => 'string',
        'table_content' => 'string',
        'footer_description' => 'string',
        'section_image' => 'string',
        'button_name' => 'string',
        'button_link' => 'string',
        'status' => 'string',
    ];
}
