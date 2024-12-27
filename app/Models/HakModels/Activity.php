<?php

namespace App\Models\HakModels;

use App\Casts\UserNameCast;
use App\Casts\UserNameCauserCast;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity as SpatieActivity;
use Spatie\Permission\Models\Permission as SpatiePermission;
use App\Casts\UserNameCreatedCast;
use App\Casts\UserNameUpdatedCast;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCreatedCast;
use App\Casts\TimeZoneUpdatedCast;
use App\Casts\TitleCast;
use Carbon\Carbon;

class Activity extends SpatieActivity
{
    protected function casts(): array
    {
        return [
            'created_at_formatted' => TimeZoneCreatedCast::class,
            'updated_at_formatted' => TimeZoneUpdatedCast::class,
            'causer_name' => UserNameCauserCast::class,
            'created_by_name' => UserNameCreatedCast::class,
            'updated_by_name' => UserNameUpdatedCast::class,
            'name' => TitleCast::class,
            'status' => StatusCast::class,
            'status_with_icon' => StatusIconCast::class,
        ];
    }

    protected $appends = ['status_with_icon', 'updated_at_formatted', 'created_at_formatted', 'created_by_name', 'updated_by_name', 'causer_name'];

    public function activityUser()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
}
