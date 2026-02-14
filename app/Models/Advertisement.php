<?php

namespace App\Models;

use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Advertisement extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'advertisement_id', 'id');
    }

    public function orderDetail(): HasOne
    {
        return $this->hasOne(OrderDetail::class, 'advertisement_id', 'id');
    }

    public function propertyStatus(): MorphMany
    {
        return $this->morphMany(PropertyStatus::class,'sourceable');
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class,'notifiable');
    }
}
