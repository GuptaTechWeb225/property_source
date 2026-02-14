<?php

namespace App\Models;

use App\Models\User;
use App\Models\Notification;
use App\Models\Property\CategoryWiseDocumentTemplate;
use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyDocument extends Model
{
    use HasFactory;

    public function file(): BelongsTo
    {
        return $this->belongsTo(Image::class,'attachment_id');
    }

    public function updator()
    {
        return $this->belongsTo(User::class,'updated_by');
    }


    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }


    public function template(): BelongsTo
    {
        return $this->belongsTo(CategoryWiseDocumentTemplate::class,'template_id');
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class,'notifiable');
    }
}
