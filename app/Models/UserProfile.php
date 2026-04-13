<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TradeSector;

class UserProfile extends Model
{
    protected $fillable = [
        
        'user_id',
        'company_name',
        'slug',
        'slogan',
        'company_type',
        'number_of_employees',
        'company_description',
        'about',
        'is_active',
        ];
    public function user(){
        return $this->belongsTo(User::class);
    }
        public function tradeSectors()
    {
        // Links this profile to TradeSectors using the shared user_id
        return $this->hasMany(TradeSector::class, 'user_id', 'user_id');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
