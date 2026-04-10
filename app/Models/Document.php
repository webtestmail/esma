<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\DocumentCategory;

class Document extends Model
{
    //
    public function documentcategory()
    {
        return $this->belongsTo(DocumentCategory::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_public', 1);
    }
}
