<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $fillable =['user_id','amount','account_id','user_note','admin_note','status'];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function bank(){
        return $this->belongsTo(BankAccount::class,'account_id');
    }
}
