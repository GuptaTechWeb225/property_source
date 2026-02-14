<?php

namespace App\Models\Locations;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    protected $table = 'unions';
    protected $fillable = ['upazilla_id', 'name', 'bn_name', 'url', 'status'];

    public function upazilla()
    {
        return $this->belongsTo('App\Models\Locations\Upazilla');
    }

    public function districts()
    {
        return $this->belongsToMany('App\Models\Locations\District', 'locations_districts_unions', 'union_id', 'district_id');
    }





}
