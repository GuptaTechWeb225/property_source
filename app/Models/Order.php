<?php

namespace App\Models;


use App\Models\User;
use App\Models\MasterOrder;
use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function masterOrder()
    {
        return $this->belongsTo(MasterOrder::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function orderPayment()
    {
        return $this->hasMany(OrderPayment::class);
    }

    public function tenant() : BelongsTo
    {
        return $this->belongsTo(User::class, 'tenant_id', 'id');
    }
    public function orderDetails() : HasMany
    {
        return $this->HasMany(OrderDetail::class);
    }

}
