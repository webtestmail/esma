<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    protected $fillable = [
        'position_order',
        'faq_type',
        'question',
        'answer',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'position_order' => 'integer',
        'faq_type' => 'string',
        'question' => 'string',
        'answer' => 'string',
        'status' => 'string',
    ];
}
