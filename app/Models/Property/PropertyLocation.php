<?php

namespace App\Models\Property;

use App\Models\City;
use App\Models\State;
use App\Models\Locations\Country;
use App\Models\Locations\Upazila;
use App\Models\Locations\District;
use App\Models\Locations\Division;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'state',
        'city',
        // Add other fillable fields if necessary
    ];

    // public function upazila():BelongsTo
    // {
    //     return $this->belongsTo(Upazila::class, 'upazila_id');
    // }

    // public function district():BelongsTo
    // {
    //     return $this->belongsTo(District::class, 'district_id');
    // }

    // public function division():BelongsTo
    // {
    //     return $this->belongsTo(Division::class, 'division_id');
    // }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
