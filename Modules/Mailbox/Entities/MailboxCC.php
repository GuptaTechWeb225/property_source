<?php

namespace Modules\Mailbox\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MailboxCC extends Model
{
    use HasFactory;

    protected $table = 'mailbox_cc';
    protected $guarded = [];
}
