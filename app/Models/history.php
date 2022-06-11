<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    //protected $table ="histories";
    protected $fillable = [
        'user_id',
        'user_email',
        'send_amt',
        'status',
        'action_nature'

    ];
}
