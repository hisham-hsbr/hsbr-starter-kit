<?php

namespace App\Casts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TimeZoneVerifiedCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $value = $attributes['email_verified_at'] ?? null;
        $user = Auth::user();
        $userTimeZone = $user && $user->timeZone ? $user->timeZone->time_zone : 'UTC'; // Default to 'UTC' or any other fallback
        $timeZone = $userTimeZone;

        return Carbon::parse($value)->setTimezone(timeZone: $timeZone)->format('d-M-Y h:i A');
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }
}
