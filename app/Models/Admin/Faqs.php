<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;

    protected $table = 'faqs';

        public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'category_id');
    }

    protected $fillable = [
        'position_order',
        'faq_type',
        'question',
        'answer',
        'status',
        'category_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'position_order' => 'integer',
        'faq_type' => 'string',
        'question' => 'string',
        'answer' => 'string',
        'status' => 'string',
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    
}
