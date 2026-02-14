<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'highlight_title_one',
        'highlight_title_two',
        'description',
        'btn_one',
        'btn_two',
        'status'
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
