<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponTransfer extends Model
{
    use HasFactory;
    protected $table = "coupon_transfers";
    protected $fillable = [
        'user_id',
        'rec_id',
        'sender_email',
        'sender_name',
        'rec_email',
        'rec_name',
        'status',
        'amt_send',
        'act_status',
        'acct_status2'
    ];
}
