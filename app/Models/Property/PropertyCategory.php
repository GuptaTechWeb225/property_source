<?php

namespace App\Models\Property;

use App\Models\Image;
use Illuminate\Support\Str;
use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property\CategoryWiseDocumentTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','icon_id','image_id','status','parent_id','is_featured'];

    protected static function  boot()
    {
        parent::boot();
        static::saving(function($model) {
            $model->attributes['slug'] = Str::slug($model->name);
        });
    }

    // hasMany relation with Property model
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    // belongsTo relation with PropertyCategory model
    public function parent()
    {
        return $this->belongsTo(PropertyCategory::class, 'parent_id');
    }

    // belongsTo relation with images model
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    // belongsTo relation with images model
    public function icon()
    {
        return $this->belongsTo(Image::class, 'icon_id');
    }


     // hasMany relation with Property model
     public function documents()
     {
         return $this->hasMany(CategoryWiseDocumentTemplate::class,'category_id');
     }
}
