<?php

namespace Modules\Marsland\Entities;

use App\Models\Property\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    public $cartCount = 0;

    protected $guarded = [];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'tenant_id','id');
    }


    public static function cartCount()
    {
        if (auth()->check()){
            return Cart::where('tenant_id', auth()->id())->count();
        }
        return 0;
    }




}
