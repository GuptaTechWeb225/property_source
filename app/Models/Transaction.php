<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'payment' => Payment::class,
    'income' => Income::class,
    'expense' => Expense::class,
]);

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sourceable(): MorphTo
    {
        return $this->morphTo();
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
