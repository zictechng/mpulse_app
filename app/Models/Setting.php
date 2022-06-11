<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table ="settings";
    protected $fillable = [
        'user_id',
        'topup_email',
        'debit_email',
        'acct_email',
        'fa2_email',
        'credit_email',
        'update_email',
        'promo_email',
        'otp_email',
        'setting_status'
     ];
}
