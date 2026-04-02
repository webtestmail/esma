<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServiceFaqs extends Model
{
    use HasFactory;

    protected $table = 'subservice_faqs';

    protected $fillable = [
        'service_id',
        'question',
        'answer',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'question' => 'string',
        'answer' => 'string',
        'status' => 'string',
    ];
}
