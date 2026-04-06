<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'last',
        'username',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'phone_verified',
        'term_box_check',
        'role',
        'phone',
        'is_active'
    ];
    
    public const ROLE_MEMBER = 0;
    public const ROLE_ADMIN  = 1;
    public const ROLE_SUBMEMBER = 2;
    public const ROLE_SUBADMIN = 4;


    public function getIsAdminAttribute()
    {
        return $this->role === self::ROLE_ADMIN;
    }
        public function getIsMemberAttribute(): bool
    {
        return $this->role === self::ROLE_MEMBER;
    }
        public function getIsSubMemberAttribute(): bool
    {
        return $this->role === self::ROLE_SUBMEMBER;
    }
            public function getIsSubAdmin(): bool
    {
        return $this->role === self::ROLE_SUBADMIN;
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function userprofile(){
        return $this->hasOne(UserProfile::class);
    }

    public function application(){
        return $this->hasOne(Application::class,'user_id');
    }

    
    public function subscription(){
        return $this->hasMany(Subscription::class,'user_id');
    }
    
    public function hasActiveSubscription()
    {
        return $this->subscription()->active()->first();
    }

    public function tradeSectors()
    {
        return $this->belongsToMany(TradeSector::class, 'member_trade_sector');
    }
    public function productCategories()
    {
        // If your table name isn't standard, specify it as the 2nd argument
        return $this->belongsToMany(ProductCategory::class, 'category_member');
    }
    public function temperatures()
    {
        return $this->belongsToMany(Temperature::class, 'member_temperature');
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_member');
    }
}
