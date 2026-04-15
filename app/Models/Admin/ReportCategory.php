<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ReportCategory extends Model
{
    protected $table = "report_categories";

    protected $fillable = [
        'name',
        'slug',
        'status',
        'position_order'
    ];
}
