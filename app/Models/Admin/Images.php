<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'reference_id',
        'reference_type',
        'file_type',
        'file_name',
        'file_path',
        'upload_date',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'reference_id' => 'integer',
        'reference_type' => 'string',
        'file_type' => 'string',
        'file_name' => 'string',
        'file_path' => 'string',
        'upload_date' => 'date',
        'status' => 'string',
    ];
}
