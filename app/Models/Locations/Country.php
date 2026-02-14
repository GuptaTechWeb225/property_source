<?php


namespace App\Models\Locations;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = [
        'name',
        'iso2',
        'currency',
        'currency_name',
        'currency_symbol',
        'status',
    ];

    // is status is active or not
    public function isActive()
    {
        return $this->status == 1;
    }

    // get country name
    public function getCountryName()
    {
        return $this->name;
    }

    // get country code
    public function getCountryCode()
    {
        return $this->code;
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}