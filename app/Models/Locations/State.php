<?php


namespace App\Models\Locations;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = [
        'name',
        'iso2',
        'country_id',
        'status',
    ];

    // is status is active or not
    public function isActive()
    {
        return $this->status == 1;
    }

    // get state name
    public function getStateName()
    {
        return $this->name;
    }

    // get state code
    public function getStateCode()
    {
        return $this->code;
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}