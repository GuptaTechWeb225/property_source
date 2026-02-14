<?php

namespace App\Models;

use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected  $guarded = [];


    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
