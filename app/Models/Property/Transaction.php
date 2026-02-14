<?php

namespace App\Models\Property;

use App\Models\Category;
use App\Models\User;
use App\Models\Image;
use App\Models\Rental;
use App\Models\Document;
use App\Models\Property\Property;
use App\Models\Property\PropertyTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
     'type',
     'property_id',
     'amount',
     'rent',
     'property_tenant_id',
     'rental_id',
     'attachment_id',
     'created_by',
     'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
    public function tenant()
    {
        return $this->belongsTo(PropertyTenant::class, 'property_tenant_id', 'id');
    }
    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }

    // rental
    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id', 'id');
    }

    // attachment_id
    public function attachment()
    {
        return $this->belongsTo(Image::class, 'attachment_id', 'id');
    }
    // category_id
    public function categories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

}
