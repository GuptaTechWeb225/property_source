<?php

namespace Modules\BilnetPropertyOwnerForm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemporaryPropertyOwner extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'temp_property_owner';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'token',
        'phone',
        'email',
        'otp',
        'verifications',
        'last_updated_slide_no',
        'last_completed_slide_no',
        'is_completed',
        'verifications',
    ];

    // Validation rules
    public static $rules = [
        'token' => 'required|string|unique:temp_property_owner',
        'phone' => 'nullable|string|unique:temp_property_owner',
        'email' => 'nullable|email|unique:temp_property_owner',
        'last_updated_slide_no' => 'required|integer',
        'last_completed_slide_no' => 'required|integer',
        'is_completed' => 'boolean',
    ];

    // Define relationship with PropertyOwnerForm
    public function propertyOwnerForms()
    {
        return $this->hasMany(PropertyOwnerForm::class, 'property_owner_id');
    }
}
