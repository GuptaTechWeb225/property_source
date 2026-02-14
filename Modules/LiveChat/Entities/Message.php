<?php

namespace Modules\LiveChat\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function scopeUser($query)
    {
        return $query->where('sender_id', auth()->user()->id);
    }

    public function scopeUserReceiverIdOrReceiverUserId($query, $id)
    {
        return $query->where('sender_id', auth()->user()->id)->where('receiver_id', $id)->orWhere('sender_id', $id)->where('receiver_id', auth()->user()->id);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_seen', 0);
    }
}
