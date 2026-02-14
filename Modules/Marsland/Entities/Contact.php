<?php

namespace Modules\Marsland\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
