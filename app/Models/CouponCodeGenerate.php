<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCodeGenerate extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'generate_code',
        'code_amount',
        'partner_status',
        'code_status',
        'user_id',
        'code_use_date',
        'partn_reg_date',
        'partn_confirmdate',
        'partn_pay_code',
        'partn_batch_code'
    ];
}
