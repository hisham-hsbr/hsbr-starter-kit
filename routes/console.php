<?php

use App\Models\HakModels\Settings;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();


// Schedule::command('backup:run')
//     ->dailyAt('02:00')
//     ->withoutOverlapping();
$backup_automatic = Settings::where('name', 'backup_automatic_schedule')->first()->value;
$backup_automatic_db_only = Settings::where('name', 'backup_automatic_db_only')->first()->value;

$backup_frequency_time = Settings::where('name', 'backup_schedule_frequencies')->first()->value;

$backup_schedule_frequency = preg_replace('/\s*\(.*?\)/', '', subject: $backup_frequency_time);





// Clean the schedule frequencies
preg_match('/\((.*?)\)/', $backup_frequency_time, $matches);
$inside_bracket = $matches[1] ?? '';

if ($backup_automatic == 1) {
    if ($backup_automatic_db_only == 1) {
        Schedule::command('backup:run --only-db')
            ->{$backup_schedule_frequency}($backup_frequency_time)
            ->withoutOverlapping()
            ->onSuccess(function () {
                // Dispatch the command to the queue
                Queue::push(function () {
                    Artisan::call('backup:run --only-db');
                });
            });
    } else {
        Schedule::command('backup:run')
            ->{$backup_schedule_frequency}($backup_frequency_time)
            ->withoutOverlapping()
            ->onSuccess(function () {
                // Dispatch the command to the queue
                Queue::push(function () {
                    Artisan::call('backup:run');
                });
            });
    }
}

// Schedule::command('backup:run')
//     ->everyFiveMinutes()
//     ->withoutOverlapping();