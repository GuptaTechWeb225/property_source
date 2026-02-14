<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model
{
    use HasFactory;

    public function image_one(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id_one');
    }

    public function image_two(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id_two');
    }

    public function image_three(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id_three');
    }

    public function image_four(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id_four');
    }

    public function image_five(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id_five');
    }
}
