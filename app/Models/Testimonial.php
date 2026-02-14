<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
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
