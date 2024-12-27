<?php

namespace App\Models\HakModels;


use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCreatedCast;
use App\Casts\TimeZoneUpdatedCast;
use App\Casts\TitleCast;
use App\Casts\UserNameCast;

use Illuminate\Database\Eloquent\Model;

class Permission extends SpatiePermission
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $attributes = [
        'guard_name' => 'web'
    ];
    protected $fillable = [
        'code',
        'name',
        'local_name',
        'description',
        'edit_description',
        'status',
        'created_by',
        'updated_by',
    ];
    protected $casts = [
        'created_at' => TimeZoneCreatedCast::class,
        'updated_at' => TimeZoneUpdatedCast::class,
        'created_by' => UserNameCast::class,
        'updated_by' => UserNameCast::class,
        'local_name' => TitleCast::class,
        'name' => TitleCast::class,
        'status' => StatusCast::class,
        'status_with_icon' => StatusIconCast::class,
    ];
    protected $appends = ['status_with_icon'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function getActivitylogOptions(): LogOptions
    {
        $useLogName = 'Permission';
        return LogOptions::defaults()
            ->logOnly(['code', 'name', 'local_name', 'description', 'default', 'status', 'deleted_at'])
            // ->logOnly(['code', 'name', 'local_name', 'description', 'default', 'status', 'created_at', 'updated_at', 'deleted_at'])
            ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
            ->useLogName($useLogName)
            ->logOnlyDirty();
    }
}
