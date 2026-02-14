<?php

namespace App\Models;

use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class OrderDetail extends Model
{
    use HasFactory;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function propertyStatus(): MorphMany
    {
        return $this->morphMany(PropertyStatus::class,'sourceable');
    }
    public function duePayment(): MorphMany
    {
        return $this->morphMany(DuePayment::class,'sourceable');
    }

    public function advertisement(): BelongsTo
    {
        return $this->belongsTo(Advertisement::class);
    }


    public function familyMembers()
    {
        return $this->hasMany(\Modules\Marsland\Entities\FamilyMember::class, 'order_details_id', 'id');
    }


    public function payments(): MorphMany
    {
        return $this->morphMany(Payment::class,'sourcable');
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class,'notifiable');
    }

    public function assets(): HasMany
    {
        return $this->hasMany(\Modules\Marsland\Entities\TenantAsset::class,'order_detail_id','id');
    }
}
