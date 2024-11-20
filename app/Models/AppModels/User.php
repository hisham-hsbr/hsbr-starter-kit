<?php

namespace App\Models\AppModels;

use App\Casts\TimeZoneCast;
use App\Traits\HasCommonFeaturesTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Casts\UserNameCreatedCast;
use App\Casts\UserNameUpdatedCast;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCreatedCast;
use App\Casts\TimeZoneUpdatedCast;
use App\Casts\TitleCast;
use App\Casts\UserNameCast;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes, LogsActivity;
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'avatar',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected $casts = [
        'email_verified_at_formatted' => TimeZoneCast::class,
        'created_at_formatted' => TimeZoneCreatedCast::class,
        'updated_at_formatted' => TimeZoneUpdatedCast::class,
        'created_by_name' => UserNameCreatedCast::class,
        'updated_by_name' => UserNameUpdatedCast::class,
        'name' => TitleCast::class,
        'status' => StatusCast::class,
        'status_with_icon' => StatusIconCast::class,

        'settings' => 'array'
    ];
    protected $appends = ['status_with_icon', 'created_at_formatted', 'updated_at_formatted', 'created_by_name', 'updated_by_name', 'email_verified_at_formatted'];

    protected $attributes = [
        'settings' => '{"personal_settings":"1","layout_sidebar_collapse":null,"layout_dark_mode":null,"default_status":1,"permission_view":"list"}'
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $useLogName = 'User';
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'password', 'description', 'default', 'status', 'created_at', 'updated_at', 'deleted_at'])
            ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
            ->useLogName($useLogName)
            ->logOnlyDirty();
    }
    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class, 'time_zone_id', 'id');
    }
}
