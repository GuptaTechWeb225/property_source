<?php

namespace App\Models;

use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'advertisement' => Advertisement::class,
    'orderDetail' => OrderDetail::class,
]);
class PropertyStatus extends Model
{
    use HasFactory;

    protected  $guarded = [];
    public function sourceable(): MorphTo
    {
        return $this->morphTo();
    }


    public function advertisement(): BelongsTo
    {
        return $this->belongsTo(Advertisement::class,'sourceable_id');
    }

    public function orderDetail(): BelongsTo
    {
        return $this->belongsTo(OrderDetail::class,'sourceable_id');
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class,'tenant_id','id');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
