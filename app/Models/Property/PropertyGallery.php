<?php

namespace App\Models\Property;

use App\Models\Image;
use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyGallery extends Model
{
    use HasFactory;

    // belongsTo relation with images model
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    // belongsTo relation with Property model
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
