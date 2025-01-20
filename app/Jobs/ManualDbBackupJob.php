<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;

class ManualDbBackupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public function handle()
    {
        try {
            // Run the database backup
            Artisan::call('backup:run', ['--only-db' => true]);

            // Path to the backup folder
            $backupPath = storage_path('app/private/HSBR Starter Kit');
            $files = collect(File::files($backupPath))->sortByDesc(function ($file) {
                return $file->getMTime();
            });

            // Rename the most recent backup file
            if ($files->isNotEmpty()) {
                $latestBackupFile = $files->first();

                // Generate a custom file name
                $timeZoneName = '-(' . Auth::user()->timeZone->time_zone . ')';
                $time = now()->setTimezone(Auth::user()->timeZone->time_zone)->format('d-M-Y h:i A');
                $customFileName = 'custom-db-backup-' . $time . $timeZoneName . '.zip';
                // $customFileName = 'custom-db-backup-' . now()->format('Y-m-d_H-i-s') . '.zip';
                $customFilePath = $backupPath . '/' . $customFileName;

                // Rename the backup file
                File::move($latestBackupFile->getPathname(), $customFilePath);
            }
        } catch (\Exception $e) {
            // Handle exceptions if necessary
            logger()->error('Database backup failed: ' . $e->getMessage());
        }
    }
}