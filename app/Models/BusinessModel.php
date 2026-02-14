<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'keypoint',
        'image_id',
        'status'
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
