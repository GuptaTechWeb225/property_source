<?php

namespace Modules\Mailbox\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mailbox extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function sourceable()
    {
        return $this->morphTo();
    }

    public function mailboxCC(): HasMany
    {
        return $this->hasMany(MailboxCC::class, 'mailbox_id', 'id');
    }

    public function mailboxAttachments(): HasMany
    {
        return $this->hasMany(MailboxAttachment::class, 'mailbox_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Mailbox::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(Mailbox::class, 'parent_id', 'id');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by')->select('id', 'name');
    }
    
    public function mailboxRecipients(): HasMany
    {
        return $this->hasMany(MailboxRecipient::class, 'mailbox_id', 'id');
    }
}
