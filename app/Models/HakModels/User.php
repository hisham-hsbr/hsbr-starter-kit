<?php

namespace App\Models\HakModels;

use App\Casts\TimeZoneCast;
use App\Casts\TimeZoneVerifiedCast;
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
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes, LogsActivity;
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'avatar',
        'email_verified_at',
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
        'email_verified_at_formatted' => TimeZoneVerifiedCast::class,
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
        'settings' => '{"personal_settings": {"type": "checkbox","value": "1","options": [null]},"layout_sidebar_collapse": {"type": "checkbox","value": null,"options": [null]},"layout_dark_mode": {"type": "checkbox","value": null,"options": [null]},"google_translate_mode": {"type": "checkbox","value": null,"options": [null]},"default_status": {"type": "checkbox","value": 1,"options": [null]},"default_send_email_verification": {"type": "checkbox","value": 1,"options": [null]},"permission_view": {"type": "select","value": "list","options": ["list", "group"]}}'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $useLogName = 'User';
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'email',
                'gender',
                'timeZone.time_zone',
                'password',
                'description',
                'default',
                'status',
                'email_verified_at',
                'created_at',
                'updated_at',
                'deleted_at',
            ])
            ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
            ->useLogName($useLogName)
            ->logOnlyDirty();
    }

    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class, 'time_zone_id', 'id');
    }
    public function getSettingsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }
}
