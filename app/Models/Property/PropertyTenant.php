<?php

namespace App\Models\Property;

use App\Models\User;
use App\Models\Image;
use App\Models\Rental;
use App\Models\Document;
use App\Models\EmergencyContact;
use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyTenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'property_id',
        'document_id',
        'emergency_contact_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id', 'id');
    }
    public function emergencyContact()
    {
        return $this->belongsTo(EmergencyContact::class, 'emergency_contact_id', 'id');
    }
    // landowner
    public function landowner()
    {
        return $this->belongsTo(User::class, 'landowner_id', 'id');
    }

    // rental
    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id', 'id');
    }
    // rental
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }


}
