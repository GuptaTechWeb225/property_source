<?php

namespace Modules\Marsland\Entities;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone','personal_code', 'relation', 'photo_id','document_id','property_id','tenant_id','order_details_id','status'];


    public function image()
    {
        return $this->belongsTo(Image::class, 'photo_id','id');
    }

    public function document()
    {
        return $this->belongsTo(Image::class, 'document_id','id');
    }

    public static function memberList($orderDetails_id)
    {
        $family_members = FamilyMember::where('order_details_id', $orderDetails_id)->latest()->get();
        return $family_members ?? [];
    }

    protected static function newFactory()
    {
        return \Modules\Marsland\Database\factories\FamilyMemberFactory::new();
    }
}
