<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table ="tickets";
    protected $fillable = [
        'uid',
        'u_email',
        'u_name',
        't_tiltle',
        't_subject',
        't_message',
        't_tid',
        't_status',
        't_action'

    ];
}
