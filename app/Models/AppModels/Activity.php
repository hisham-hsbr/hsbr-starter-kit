<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity as SpatieActivity;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Activity extends SpatieActivity
{
    public function activityUser()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class, 'time_zone_id', 'id');
    }
}
