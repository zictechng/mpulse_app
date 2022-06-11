<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashOut extends Model
{
    use HasFactory;
    protected $table = "cash_outs";
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'amount',
        'tran_id',
        'note_send'

    ];
}
