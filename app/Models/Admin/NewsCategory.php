<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';

    protected $fillable = [
        'name',
        'slug',
        'position_order',
        'status'
    ];

}
