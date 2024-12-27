<?php

namespace App\Casts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class StatusIconCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $active = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>';
        $activeWithDefault = '<span style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span><span style="background-color: #0703fc;color: white;padding: 3px;margin-left: 4px;width:100px;">Default</span>';
        $inActive = '<span style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In Active</span>';
        $delete = '<span style="background-color: #ff0000;color: white;padding: 3px;width:100px;">Deleted</span>';

        // checking status,deleted_at & default
        $deletedAt = $attributes['deleted_at'];
        $default = $attributes['default'];
        $status = $attributes['status'];

        // Return the appropriate HTML based on the conditions
        if ($deletedAt !== null) {
            return $delete; // Deleted
        } elseif ($status == 1) {
            return $default == 1 ? $activeWithDefault : $active; // Active or Active with Default
        } else {
            return $inActive; // Inactive
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
