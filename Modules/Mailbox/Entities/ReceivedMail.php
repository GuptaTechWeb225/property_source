<?php

namespace Modules\Mailbox\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceivedMail extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    protected static function newFactory()
    {
        return \Modules\Mailbox\Database\factories\ReceivedMailFactory::new();
    }
}
