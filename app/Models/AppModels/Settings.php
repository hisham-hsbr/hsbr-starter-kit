<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCast;
use App\Casts\TitleCast;
use App\Casts\UserNameCast;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Settings extends Model
{
    use SoftDeletes, LogsActivity;
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
