<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'icon',
        'description',
        'status'
    ];

    public function icon(): BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }
}
