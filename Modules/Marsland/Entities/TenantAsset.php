<?php

namespace Modules\Marsland\Entities;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenantAsset extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Marsland\Database\factories\TenantAssetFactory::new();
    }

    public function attachment(): BelongsTo
    {
        return  $this->belongsTo(Image::class,'attachment_id','id');
    }
}
