<?php

namespace App\Models\Locations;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

    protected $table = 'divisions';
    protected $fillable = [
        'country_id',
        'bn_name',
        'name',
        'lat',
        'lon',
        'status',
        'url'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Locations\Country');
    }

    public function district()
    {
        return $this->hasMany('App\Models\Locations\District');
    }

    public function upazila()
    {
        return $this->hasMany('App\Models\Locations\Upazila');
    }

    public function union()
    {
        return $this->hasMany('App\Models\Locations\Union');
    }

}
