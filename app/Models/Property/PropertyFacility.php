<?php

namespace App\Models\Property;

use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property\PropertyFacilityType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyFacility extends Model
{
    use HasFactory;

    // blongs to relation with PropertyFacilityType model
    public function type()
    {
        return $this->belongsTo(PropertyFacilityType::class, 'property_facility_type_id', 'id');
    }
    // belongsto relation with Property model
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
