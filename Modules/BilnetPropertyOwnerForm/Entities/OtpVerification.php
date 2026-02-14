<?php

namespace Modules\BilnetPropertyOwnerForm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OtpVerification extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'otp_verifications';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'identifier',
        'type',
        'otp',
        'verified_at',
    ];
}
