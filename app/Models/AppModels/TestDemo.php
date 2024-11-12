<?php

namespace App\Models\AppModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCast;
use App\Casts\TitleCast;
use App\Casts\UserNameCast;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class TestDemo extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $fillable = [
        'name',
        'status',
    ];
    protected $casts = [
        'created_at' => TimeZoneCast::class,
        'updated_at' => TimeZoneCast::class,
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
        $useLogName = 'TestDemo';
        return LogOptions::defaults()
            ->logOnly(['code', 'name', 'local_name', 'description', 'default', 'status'])
            // ->logOnly(['code', 'name', 'local_name', 'description', 'default', 'status', 'created_at', 'updated_at', 'deleted_at'])
            ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
            ->useLogName($useLogName)
            ->logOnlyDirty();
    }
}
