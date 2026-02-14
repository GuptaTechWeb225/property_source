<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Income extends Model
{
    use HasFactory;

    public function getDateAttribute($value)
    {
       return isset($value) ? date('Y-m-d', strtotime($value)) : null ;
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function createdby(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(PropertyTenant::class, 'property_tenant_id', 'id');
    }

    public function account(): BelongsTo
    {
        return  $this->belongsTo(Account::class);
    }

    public function category(): BelongsTo
    {
        return  $this->belongsTo(AccountCategory::class);
    }
    public function transaction(): MorphOne
    {
        return $this->morphOne(Transaction::class,'sourcable');
    }

    public function transactions(): MorphMany
    {
        return $this->morphMany(Transaction::class,'sourcable');
    }


}
