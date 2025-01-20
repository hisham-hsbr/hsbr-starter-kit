<?php

use App\Models\HakModels\Settings;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Queue;

// Define the Artisan command
Artisan::command('notify:birthdays', function () {
    dispatch(new \App\Jobs\NotifyUserBirthday());
})->describe('Send birthday notifications');

// Schedule the commands and add them to the queue system
app(Schedule::class)->call(function () {
    dispatch(new \App\Jobs\NotifyUserBirthday());
})->dailyAt('08:00')->name('notify_birthdays_morning')->withoutOverlapping();

app(Schedule::class)->call(function () {
    dispatch(new \App\Jobs\NotifyUserBirthday());
})->dailyAt('14:34')->timezone('America/Toronto')->name('notify_birthdays_afternoon')->withoutOverlapping();

// Backup-related tasks
$backup_automatic = Settings::where('name', 'backup_automatic_schedule')->first()->value;
$backup_automatic_db_only = Settings::where('name', 'backup_automatic_db_only')->first()->value;
$backup_frequency_time = Settings::where('name', 'backup_schedule_frequencies')->first()->value;

// Clean the schedule frequencies
$backup_schedule_frequency = preg_replace('/\s*\(.*?\)/', '', $backup_frequency_time);
preg_match('/\((.*?)\)/', $backup_frequency_time, $matches);
$inside_bracket = $matches[1] ?? '';

if ($backup_automatic == 1) {
    if ($backup_automatic_db_only == 1) {
        app(Schedule::class)->call(function () {
            dispatch(function () {
                Artisan::call('backup:run --only-db');
            })->onQueue('backups');
        })->{$backup_schedule_frequency}($inside_bracket)
            ->name('backup_only_db')
            ->withoutOverlapping();
    } else {
        app(Schedule::class)->call(function () {
            dispatch(function () {
                Artisan::call('backup:run');
            })->onQueue('backups');
        })->{$backup_schedule_frequency}($inside_bracket)
            ->name('backup_full')
            ->withoutOverlapping();
    }
}