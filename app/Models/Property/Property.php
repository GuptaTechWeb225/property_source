<?php

namespace App\Models\Property;

use App\Models\FavouriteProperty;
use App\Models\PropertyOffer;
use App\Models\User;
use App\Models\Image;
use App\Models\Rental;
use App\Models\Document;
use App\Models\Wishlist;
use App\Models\OrderDetail;
use App\Models\Notification;
use App\Models\Advertisement;
use App\Models\PropertyDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    protected $casts = [
        'document_ids' => 'array',
        'images' => 'array',
    ];
    protected $guarded = [];
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function offers()
    {
        return $this->hasMany(PropertyOffer::class);
    }

    public function advertisements(): HasMany
    {
        return $this->hasMany(Advertisement::class,'property_id');
    }

    public function advertisement(): HasOne
    {
        return $this->HasOne(Advertisement::class,'property_id');
    }

    // hasMany relation with PropertyGallery model
    public function galleries()
    {
        return $this->hasMany(PropertyGallery::class);
    }
    public function floorPlans()
    {
        return $this->hasMany(PropertyGallery::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
    public function tenants()
    {
        return $this->hasMany(PropertyTenant::class);
    }

    // hasMany relation with PropertyFacility model
    public function facilities()
    {
        return $this->hasMany(PropertyFacility::class);
    }

    // belongsTo relation with PropertyCategory model
    public function category()
    {
        return $this->belongsTo(PropertyCategory::class, 'property_category_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class,'id','property_id');
    }

    // default_image
    public function defaultImage()
    {
        return $this->belongsTo(Image::class, 'default_image', 'id');
    }


    public function tenant()
    {
        return $this->belongsTo(PropertyTenant::class);
    }

    public function location():HasOne
    {
        return $this->hasOne(PropertyLocation::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function orderDetail(): HasOne
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function documents(): HasMany
    {
       return $this->hasMany(PropertyDocument::class,'property_id','id');
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class,'notifiable');
    }


    public function favourites()
    {
        return $this->belongsTo(FavouriteProperty::class);
    }
}
