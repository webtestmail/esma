<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['campagin_id','title',
            'price',
            'description',
            'product_quantity',
            'product_link',
            'product_image'];
            
    public function campaign(){
        return $this->belongsTo(Campaign::class,'campagin_id');
    }
    public function productImage(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
}
