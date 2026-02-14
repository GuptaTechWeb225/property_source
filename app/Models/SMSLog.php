<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSLog extends Model
{
    use HasFactory;
    protected  $table = 'sms_logs';
    protected $fillable = [
        'name',
        'phone',
        'message',
        'is_sent',
        'send_to',
        'send_by',
    ];
}
