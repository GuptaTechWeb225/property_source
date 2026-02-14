<?php

namespace App\Models\Locations;

use App;
use App\Models\Locations\Country;
use Illuminate\Database\Eloquent\Model;
use App\Models\Locations\CityTranslation;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'name',
        'iso2',
        'country_id',
        'state_id',
        'status'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}