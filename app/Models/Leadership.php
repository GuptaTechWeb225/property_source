<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leadership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'image',
        'message',
        'status'
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
