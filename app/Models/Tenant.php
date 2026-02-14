<?php

namespace App\Models;

use App\Models\Hrm\Designation;
use App\Models\Locations\Country;
use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Tenant extends Model
{
    use HasFactory;
    protected  $table = 'users';
    protected $fillable=[
        'name',
        'email',
        'phone',
    ];
    public function image(){
        return $this-> belongsTo(Image::class);
    }
    public function document(){
        return $this-> belongsTo(Image::class,'document_id','id');
    }

    public function getStartDateAttribute($date)
    {
        return !empty($date) ? date('Y-m-d'): null;
    }
    public function getEndDateAttribute($date)
    {
        return !empty($date) ? date('Y-m-d'): null;
    }
    public function getDateOfBirthAttribute($date)
    {
        return !empty($date) ? date('F d Y'): null;
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

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

    public function permanentCountry()
    {
        return $this->belongsTo(Country::class,'per_country_id','id');
    }
    public function permanentState()
    {
        return $this->belongsTo(State::class,'per_state_id','id');
    }
    public function permanentCity()
    {
        return $this->belongsTo(City::class,'per_city_id','id');
    }

    public function properties()
    {
        return $this->hasMany(Order::class,'tenant_id','id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
