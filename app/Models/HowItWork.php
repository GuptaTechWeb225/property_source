<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HowItWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'message',
        'status'
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
