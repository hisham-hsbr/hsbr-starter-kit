<?php

namespace App\Traits;

use App\Casts\CreatedUserNameCast;
use App\Casts\UpdatedUserNameCast;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCast;
use App\Casts\TitleCast;
use App\Casts\UserNameCast;

trait HasCommonFeaturesTrait
{
    protected function casts(): array
    {
        return [
            'created_at_formatted' => TimeZoneCast::class,
            'updated_at_formatted' => TimeZoneCast::class,
            'created_by_name' => CreatedUserNameCast::class,
            'updated_by_name' => UpdatedUserNameCast::class,
            'name' => TitleCast::class,
            'status' => StatusCast::class,
            'status_with_icon' => StatusIconCast::class,
        ];
    }

    protected function appends(): array
    {
        return [
            'status_with_icon',
            'created_at_formatted',
            'updated_at_formatted',
            'created_by_name',
            'updated_by_name'
        ];
    }
    // protected $appends = ['status_with_icon', 'created_at_formatted', 'updated_at_formatted', 'created_by_name', 'updated_by_name'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
