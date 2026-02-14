<?php

namespace App\Models;

use App\Models\Property\Property;
use App\Models\Property\PropertyTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmergencyContact extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at',
     ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
    public function propertyTenant(): BelongsTo
    {
        return $this->belongsTo(PropertyTenant::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
