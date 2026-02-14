<?php

namespace App\Models;

use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Bill extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(User::class,'tenant_id','id');
    }

    public function createdby(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function payments(): MorphMany
    {
        return $this->morphMany(Payment::class,'sourcable');
    }



}
