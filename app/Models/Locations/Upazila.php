<?php

namespace App\Models\Locations;

use App\Models\Orders\Order;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{

    protected $table = 'upazilas';
    protected $fillable = ['country_id', 'division_id', 'district_id', 'name', 'bn_name', 'url', 'status'];

    public function district()
    {
        return $this->belongsTo('App\Models\Locations\District');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\Locations\Division');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Locations\Country');
    }

    public function unions()
    {
        return $this->hasMany('App\Models\Locations\Union');
    }

}
