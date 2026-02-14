<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Image;
use App\Models\Account;
use App\Models\Wishlist;
use App\Models\Notification;
use App\Models\BillingAddress;
use App\Models\Hrm\Designation;
use App\Models\Locations\Country;
use App\Models\Property\Property;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Property\PropertyTenant;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'permissions' => 'array',
        'address_details' => 'array',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class)->latest();
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function rentals(): BelongsTo
    {
        return $this->belongsTo(Rental::class);
    }

    public function rental_info(): BelongsTo
    {
        return $this->belongsTo(Rental::class, 'id', 'property_tenant_id');
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function organization(): HasOne
    {
        return $this->hasOne(Organization::class, "user_id", 'id');
    }


    public function isCustomer()
    {
        return $this->role_id === 5;
    }


    public function tenant()
    {
        return $this->belongsTo(PropertyTenant::class, 'id', 'user_id');
    }

    public function billingAddress()
    {
        return $this->hasMany(BillingAddress::class);
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function proofId()
    {
        return $this->belongsTo(Image::class,'proof_of_id');
    }

    public function proofAddress()
    {
        return $this->belongsTo(Image::class,'proof_of_address');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'tenant_id', 'id');
    }


}
