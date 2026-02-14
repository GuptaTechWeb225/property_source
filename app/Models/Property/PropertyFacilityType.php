<?php

namespace App\Models\Property;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property\PropertyFacility;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyFacilityType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'image_id',
        'status',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function property_facilities()
    {
        return $this->hasMany(PropertyFacility::class);
    }

}
