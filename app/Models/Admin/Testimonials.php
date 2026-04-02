<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $fillable = [
        'position_order',
        'rating_quantity',
        'client_name',
        'client_designation',
        'description',
        'client_image',
        'review_date',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'position_order' => 'integer',
        'rating_quantity' => 'integer',
        'client_name' => 'string',
        'client_designation' => 'string',
        'description' => 'string',
        'client_image' => 'string',
        'review_date' => 'date',
        'status' => 'string',
    ];
}
