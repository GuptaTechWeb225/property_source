<?php

namespace App\Models;

use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\Relation;


Relation::morphMap([
    'order-detail' => OrderDetail::class,
    'bill' => Bill::class,
]);

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['invoice_no','date','amount','payment_method','trx_no','attachment_id','additional_info'];
//    public function orderDetails(): MorphTo
//    {
//        return $this->morphTo('sourcable', OrderDetail::class);
//    }

    public function sourceable(): MorphTo
    {
        return $this->morphTo();
    }
    public function transactions(): MorphMany
    {
        return $this->morphMany(Transaction::class,'sourcable');
    }

    public function orderDetail(): BelongsTo
    {
        return $this->belongsTo(OrderDetail::class, 'sourcable_id', 'id');
    }


    public function attachment(): BelongsTo
    {
       return $this->belongsTo(Image::class,'attachment_id','id');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
