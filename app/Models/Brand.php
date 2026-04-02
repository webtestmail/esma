<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     public function scopeActive($query)
{
    return $query->where('is_active', true);
}
}
