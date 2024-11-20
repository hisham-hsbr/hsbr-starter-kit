<?php

namespace App\Casts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TimeZoneCreatedCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {

        // Retrieve the authenticated user
        $user = Auth::user();

        // Determine user's timezone or fallback to 'UTC'
        $timeZone = $user && $user->timeZone ? $user->timeZone->time_zone : 'UTC';

        // Handle cases where 'created_at' might be null or invalid
        $createdAt = $attributes['created_at'] ?? null;
        if (!$createdAt) {
            return 'N/A'; // Return a fallback value for null created_at
        }

        try {
            // Parse and format the 'created_at' timestamp
            $createdAtFormatted = Carbon::parse($createdAt)->setTimezone($timeZone)->format('d-M-Y h:i A');
            return $createdAtFormatted . ' (' . $timeZone . ') (User)';
        } catch (\Exception $e) {
            // Handle parsing errors gracefully
            return 'Invalid Date';
        }
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
