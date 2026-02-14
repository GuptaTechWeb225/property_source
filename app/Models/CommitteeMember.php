<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommitteeMember extends Model
{
    use HasFactory;

    public array $member_types = [
        ['title' => 'President', 'value' => 'is_president'],
        ['title' => 'Admin', 'value' => 'is_admin'],
        ['title' => 'Manager', 'value' => 'is_manager'],
        ['title' => 'General', 'value' => 'is_general'],
    ];

    protected $fillable = ['user_id', 'committee_id', 'member_type'];

    public function committee(): BelongsTo
    {
        return $this->belongsTo(Committee::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
