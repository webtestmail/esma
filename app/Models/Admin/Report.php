<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
      protected $table = 'reports';

    protected $fillable = [
        'name',
        'slug',
        'header_footer_name',
        'breadcrumb_description',
        'breadcrumb_image',
        'category_ids',
        'tags',
        'published_by',
        'file_name',
        'description',
        'file',
        'status'
    ];
}
