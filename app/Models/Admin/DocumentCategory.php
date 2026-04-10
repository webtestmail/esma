<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Document;

class DocumentCategory extends Model
{
    public function documents()
    {
        return $this->hasMany(Document::class, 'category_id');
    }
}
