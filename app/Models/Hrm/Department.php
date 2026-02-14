<?php

namespace App\Models\Hrm;

use App\Models\User;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{

    public function assignLeaves(): HasMany
    {
        return $this->hasMany(AssignLeave::class, 'department_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'department_id', 'id')->where('status_id', 1);
    }

}
