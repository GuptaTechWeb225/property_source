<?php

namespace App\Models;

use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteProperty extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
}
