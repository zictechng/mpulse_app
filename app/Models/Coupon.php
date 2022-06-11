<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table ="coupons";
    protected $fillable = [
        'user_id',
        'coupon_code',
        'code_amount',
        'code_status',
        'coupon_batch_code'

    ];
}
