<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_model_title',
        'business_model_description',
        'business_model_link',
        'feature_title',
        'feature_description',
        'howitworks_title',
        'howitworks_description',
        'app_store_link',
        'play_store_link',
        'testimonial_title',
        'testimonial_description',
        'blogs_title',
        'blogs_description',
    ];
}
