<?php

namespace App\Models\HakModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCreatedCast;
use App\Casts\TimeZoneUpdatedCast;
use App\Casts\UserNameCreatedCast;
use App\Casts\UserNameUpdatedCast;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Settings extends Model
{
    use SoftDeletes, LogsActivity;
    protected $casts = [
        'created_at_formatted' => TimeZoneCreatedCast::class,
        'updated_at_formatted' => TimeZoneUpdatedCast::class,
        'created_by_name' => UserNameCreatedCast::class,
        'updated_by_name' => UserNameUpdatedCast::class,
        'status' => StatusCast::class,
        'status_with_icon' => StatusIconCast::class,

        'data' => 'array',
        'form_data' => 'array',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        $useLogName = 'TestDemo';
        return LogOptions::defaults()
            ->logOnly(['name', 'model', 'default_value', 'group', 'parent', 'default_by', 'form_type', 'form_data', 'description', 'status', 'created_by', 'updated_by'])

            // ->logOnly(['code', 'name', 'local_name', 'description', 'default', 'status', 'created_at', 'updated_at', 'deleted_at'])
            ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
            ->useLogName($useLogName)
            ->logOnlyDirty();
    }
}
