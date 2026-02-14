<?php

namespace Modules\Mailbox\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MailboxRecipient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function emailUser()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
