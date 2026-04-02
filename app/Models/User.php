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
    
    public const ROLE_INFLUENCER = 0;
    public const ROLE_ADMIN  = 1;
    public const ROLE_BRAND  = 2;
    public const ROLE_HR = 3;
    public const ROLE_SUBADMIN = 4;
    public const ROLE_BRANDMANAGER = 5;
    public const ROLE_INFLUENCERMANAGER = 6;

    public function getIsAdminAttribute()
    {
        return $this->role === self::ROLE_ADMIN;
    }
        public function getIsInfluencerAttribute(): bool
    {
        return $this->role === self::ROLE_INFLUENCER;
    }
        public function getIsBrandAttribute(): bool
    {
        return $this->role === self::ROLE_BRAND;
    }
            public function getIsSubAdmin(): bool
    {
        return $this->role === self::ROLE_SUBADMIN;
    }
            public function getIsHr(): bool
    {
        return $this->role === self::ROLE_HR;
    }
            public function getIsBrandManager(): bool
    {
        return $this->role === self::ROLE_BRANDMANAGER;
    }
            public function getIsInfluencerManager(): bool
    {
        return $this->role === self::ROLE_INFLUENCERMANAGER;
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
    public function bankaccount(){
        return $this->hasMany(BankAccount::class,'user_id');
    }
    public function payment_request(){
        return $this->hasMany(PaymentRequest::class,'user_id');
    }
    
    public function subscription(){
        return $this->hasMany(Subscription::class,'user_id');
    }
    
    public function hasActiveSubscription()
    {
        return $this->subscription()->active()->first();
    }
}
