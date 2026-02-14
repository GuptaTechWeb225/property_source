<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'f_name',
        'l_name',
        'email',
        'phone_number',
        'order_no',
        'message',
        'status'
    ];
}
