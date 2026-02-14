<?php

namespace App\Models;

use App\Models\User;
use App\Models\Property\Property;
use App\Models\Property\PropertyTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_category_id' ,
        'name' ,
        'account_no' ,
        'balance' ,
        'is_default'
    ];

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

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function category() : BelongsTo
    {
        return $this->BelongsTo(AccountCategory::class,'account_category_id','id');
    }
}
