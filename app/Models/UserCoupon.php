<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'coupon_id', 'status', 'expired_time'];
    public function coupon(){
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }
}
