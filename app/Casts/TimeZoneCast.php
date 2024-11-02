<?php

namespace App\Casts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TimeZoneCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $response = Http::get("http://worldtimeapi.org/api/ip");

        if ($response->successful()) {
            $data = $response->json();
            $currentTimezone = $data['timezone'];
            $currentDatetime = $data['datetime'];
            $currentUtcOffset = $data['utc_offset'];
            $timeZone = $currentTimezone;
            return Carbon::parse($value)->setTimezone(timeZone: $timeZone)->format('d-M-Y h:i A')  . ' (' . $timeZone . ') (live)';
        }

        $user = Auth::user();
        $userTimeZone =  $user->time_zone;

        $timeZone = $userTimeZone;

        return Carbon::parse($value)->setTimezone(timeZone: $timeZone)->format('d-M-Y h:i A')  . ' (' . $timeZone . ')(User)';
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
