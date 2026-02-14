<?php

namespace App\Models\Locations;

use App\Models\Locations\Division;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  

    protected $table = 'districts';
    protected $fillable = ['country_id', 'name', 'bn_name', 'url', 'status'];

    public function country()
    {
        return $this->belongsTo('App\Models\Locations\Country', 'country_id');
    }

    public function upazilas()
    {
        return $this->hasMany('App\Models\Locations\Upazila', 'district_id');
    }

    public function getDistricts($country_id)
    {
        return $this->where('country_id', $country_id)->get();
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

}
