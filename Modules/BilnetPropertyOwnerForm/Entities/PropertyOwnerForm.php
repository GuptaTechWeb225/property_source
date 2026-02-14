<?php

namespace Modules\BilnetPropertyOwnerForm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyOwnerForm extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'property_owner_form';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'property_owner_id',
        'key',
        'value',
        'slide_no',
    ];

    // Validation rules
    public static $rules = [
        'property_owner_id' => 'required|exists:temp_property_owner,id',
        'key' => 'required|string',
        'value' => 'required|string',
        'slide_no' => 'required|integer',
    ];

    public function tempPropertyOwner()
    {
        return $this->belongsTo(TemporaryPropertyOwner::class, 'property_owner_id');
    }
}
