<?php

namespace App\Models;

use App\Models\User;
use App\Models\MasterOrder;
use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

Relation::morphMap([
    'orderDetail' => OrderDetail::class,
]);
class DuePayment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function tenant()
    {
        return $this->belongsTo(User::class,'tenant_id','id');
    }

    public function masterOrder()
    {
        return $this->belongsTo(MasterOrder::class);
    }


    public function orderDetail(): BelongsTo
    {
        return $this->belongsTo(OrderDetail::class,'sourceable_id');
    }
}
