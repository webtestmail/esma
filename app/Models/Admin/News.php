<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
        protected $table = 'news';

        protected $fillable = [
            'category_ids',
            'name',
            'slug',
            'banner',
            'title',
            'subtitle',
            'video',
            'image',
            'short_description',
            'image1',
            'description',
            'more_images',
            'full_description',
            'website_url',
            'status',
            'position_order',
            'post_meta',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'breadcrumb_description',
            'tags',
            'published_by',
            'breadcrumb_image',
            'website_name',
            'header_footer_name',
            'pdf_file'
        ];
}
