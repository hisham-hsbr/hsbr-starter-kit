<?php

namespace App\Models\AppModels;

use App\Traits\HasCommonFeaturesTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Casts\CreatedUserNameCast;
use App\Casts\UpdatedUserNameCast;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCast;
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
        'created_at_formatted' => TimeZoneCast::class,
        'updated_at_formatted' => TimeZoneCast::class,
        'created_by_name' => CreatedUserNameCast::class,
        'updated_by_name' => UpdatedUserNameCast::class,
        'name' => TitleCast::class,
        'status' => StatusCast::class,
        'status_with_icon' => StatusIconCast::class,
    ];
    protected $appends = ['status_with_icon', 'created_at_formatted', 'updated_at_formatted', 'created_by_name', 'updated_by_name'];

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
