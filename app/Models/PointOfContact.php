<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointOfContact extends Model
{
    protected $fillable = [
        'user_id',
        'is_primary',
        'contact_name',
        'contact_surname',
        'contact_position',
        'contact_gender',
        'contact_email',
        'contact_phone',
        'image',
        'is_active'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeActive($query){
        return $query->where('is_active', 1);
    }
}
