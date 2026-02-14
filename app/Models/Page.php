<?php

namespace App\Models;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','image_id','title','slug','content','serial','status','parent_id','show_menu'];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id', 'id')->with('children');
    }

}
