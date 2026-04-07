<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
     protected $table = 'faq_categories';

    protected $fillable = [
       'name',
       'status',
       'position_order',
    ];


      public function faqs()
    {
        return $this->hasMany(Faqs::class, 'category_id')->orderBy('position_order', 'asc'); ;
    }
}
