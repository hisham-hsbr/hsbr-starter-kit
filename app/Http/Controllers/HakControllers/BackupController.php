<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use App\Jobs\ManualDbBackupJob;
use App\Models\HakModels\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Backup\BackupDestination\BackupDestinationFactory;

class BackupController extends Controller
{
    private $headName = 'Backups';
    private $routeName = 'backups';
    private $permissionName = 'Backup';
    private $snakeName = 'backup';
    private $camelCase = 'backup';
    private $model = 'Backup';

    public function index()
    {

        $settings = Settings::where('model', $this->model)->get();
        $backup_frequency = Settings::where('name', 'backup_schedule_frequencies')->first()->value;

        $backup_schedule_frequencies = preg_replace('/\s*\(.*?\)/', '', subject: $backup_frequency);





        // Clean the schedule frequencies
        preg_match('/\((.*?)\)/', $backup_frequency, $matches);
        $inside_bracket = $matches[1] ?? null;


        // backup destinations & details
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $backupPath = config('backup.backup.name') . '/';
        $backupFiles = array_filter($disk->files($backupPath), fn($file) => str_ends_with($file, '.zip'));

        $lastBackupTime = !empty($backupFiles) ? Carbon::createFromTimestamp($disk->lastModified(collect($backupFiles)->sortByDesc(fn($file) => $disk->lastModified($file))->first())) : null;
        $lastBackupTime = $lastBackupTime ? $lastBackupTime->timezone(Auth::user()->timeZone->time_zone ?? 'UTC') : null;

        // backup files
        // Get the disk specified in the backup configuration
        $diskName = config('backup.backup.destination.disks')[0];
        $disk = Storage::disk($diskName);

        // Define the backup directory
        $backupPath = config('backup.backup.name') . '/';

        // Fetch all files in the backup directory
        $files = $disk->files($backupPath);

        // if (empty($files)) {
        //     dd("No files found in backup path: $backupPath");
        // }


        // Filter files (optional: filter for `.zip` files if applicable)
        $backupFiles = array_filter($files, fn($file) => str_ends_with($file, '.zip'));

        // Collect file details with download links
        $fileDetails = collect($backupFiles)->map(function ($file) use ($disk, $diskName) {
            return [
                'name' => $file,
                'size' => $disk->size($file), // File size in bytes
                'last_modified' => Carbon::createFromTimestamp($disk->lastModified($file))->timezone(Auth::user()->timeZone->time_zone ?? 'UTC')->format('Y-m-d H:i:s'),
                'download_link' => route('backups.download.backup', ['file' => $file]), // Generate route
                'delete_link' => route('backups.delete.backup', ['file' => urlencode($file)]), // Generate route for deleting
            ];
        });

        return view('backend.hak_views.app_managements.backup.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,
                'settings' => $settings,
                'backup_schedule_frequencies' => $backup_schedule_frequencies,
                'inside_bracket' => $inside_bracket,
                'lastBackupTime' => $lastBackupTime,
                'fileDetails' => $fileDetails,
            ]
        );
    }
    // Download handler for backup files
    public function downloadBackup($file)
    {
        // dd($file);
        // Decode the file path
        $file = urldecode($file);

        // Get the disk name from the configuration
        $diskName = config('backup.backup.destination.disks')[0];
        $disk = Storage::disk($diskName);

        // Check if the file exists
        if (!$disk->exists($file)) {
            abort(404, "File not found: $file");
        }

        // Get the local path of the file
        $filePath = $disk->path($file);

        // Return the file as a downloadable response
        return response()->download($filePath);
    }
    public function deleteBackup(Request $request)
    {
        $file = $request->input('file');
        $diskName = config('backup.backup.destination.disks')[0];
        $disk = Storage::disk($diskName);

        if ($disk->exists($file)) {
            $disk->delete($file);
            return response()->json(['message_success' => true, 'message' => 'File deleted successfully.']);
        }

        return response()->json(['message_success' => false, 'message' => 'File not found.'], 404);
    }

    public function create()
    {

        return view('backend.hak_views.app_managements.backup.create')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,
            ]
        );
    }
    public function manualBackup()
    {
        try {
            Artisan::queue('backup:run');
            return back()->with('message_success', 'Backup completed successfully.');
        } catch (\Exception $e) {
            return back()->with('message_error', 'Failed to complete backup: ' . $e->getMessage());
        }
    }
    public function manualDbBackup()
    {
        try {
            // Run the database backup
            Artisan::call('backup:run', ['--only-db' => true]);


            // Path to the backup folder
            $backupPath = storage_path('app/private/HSBR Starter Kit');
            $files = collect(File::files($backupPath))->sortByDesc(function ($file) {
                return $file->getMTime();
            });

            $customFileName = null;

            // Create a new file from the most recent backup
            if ($files->isNotEmpty()) {
                $latestBackupFile = $files->first();

                // Generate a custom file name
                $timeZoneName = Auth::user()->timeZone->time_zone ?? 'UTC'; // Default to 'UTC' if timeZone is null
                $time = now()->setTimezone($timeZoneName)->format('d-M-Y_h-i_s_A'); // Replace invalid ':' with '_'
                $customFileName = 'custom-db-backup-' . $time . '-' . str_replace(['/', ' '], '_', $timeZoneName) . '.zip';

                $customFilePath = $backupPath . '/' . $customFileName;

                // Create a new file with the custom name
                File::copy($latestBackupFile->getPathname(), $customFilePath);
            }
            // {{ route('backups.download.backup', ['file' => urlencode($file['name'])]) }}
            $file = 'HSBR Starter Kit/' . $customFileName;
            $downloadUrl = route('backups.download.backup', urlencode($file));

            return response()->json([
                'success' => true,
                'fileName' => $customFileName,
                'downloadUrl' => $downloadUrl,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to complete database backup: ' . $e->getMessage(),
            ]);
        }
    }
    public function manualFullBackup()
    {
        try {
            // Run the database backup
            // Artisan::call('backup:run');
            Artisan::queue('backup:run');

            // Path to the backup folder
            $backupPath = storage_path('app/private/HSBR Starter Kit');
            $files = collect(File::files($backupPath))->sortByDesc(function ($file) {
                return $file->getMTime();
            });

            $customFileName = null;

            // Create a new file from the most recent backup
            if ($files->isNotEmpty()) {
                $latestBackupFile = $files->first();

                // Generate a custom file name
                $timeZoneName = Auth::user()->timeZone->time_zone ?? 'UTC'; // Default to 'UTC' if timeZone is null
                $time = now()->setTimezone($timeZoneName)->format('d-M-Y_h-i_s_A'); // Replace invalid ':' with '_'
                $customFileName = 'custom-full-backup-' . $time . '-' . str_replace(['/', ' '], '_', $timeZoneName) . '.zip';

                $customFilePath = $backupPath . '/' . $customFileName;

                // Create a new file with the custom name
                File::copy($latestBackupFile->getPathname(), $customFilePath);
            }
            // {{ route('backups.download.backup', ['file' => urlencode($file['name'])]) }}
            $file = 'HSBR Starter Kit/' . $customFileName;
            $downloadUrl = route('backups.download.backup', urlencode($file));

            return response()->json([
                'success' => true,
                'fileName' => $customFileName,
                'downloadUrl' => $downloadUrl,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to complete database backup: ' . $e->getMessage(),
            ]);
        }
    }
    // public function manualDbBackup()
    // {
    //     try {
    //         // Run the database backup
    //         Artisan::call('backup:run', ['--only-db' => true]);


    //         // Path to the backup folder
    //         $backupPath = storage_path('app/private/HSBR Starter Kit');
    //         $files = collect(File::files($backupPath))->sortByDesc(function ($file) {
    //             return $file->getMTime();
    //         });

    //         $customFileName = null;

    //         // Create a new file from the most recent backup
    //         if ($files->isNotEmpty()) {
    //             $latestBackupFile = $files->first();

    //             // Generate a custom file name
    //             $timeZoneName = Auth::user()->timeZone->time_zone ?? 'UTC'; // Default to 'UTC' if timeZone is null
    //             $time = now()->setTimezone($timeZoneName)->format('d-M-Y_h-i_s_A'); // Replace invalid ':' with '_'
    //             $customFileName = 'custom-db-backup-' . $time . '-' . str_replace(['/', ' '], '_', $timeZoneName) . '.zip';

    //             $customFilePath = $backupPath . '/' . $customFileName;

    //             // Create a new file with the custom name
    //             File::copy($latestBackupFile->getPathname(), $customFilePath);
    //         }
    //         // {{ route('backups.download.backup', ['file' => urlencode($file['name'])]) }}
    //         $file = 'HSBR Starter Kit/' . $customFileName;
    //         $downloadUrl = route('backups.download.backup', urlencode($file));

    //         return response()->json([
    //             'success' => true,
    //             'fileName' => $customFileName,
    //             'downloadUrl' => $downloadUrl,
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Failed to complete database backup: ' . $e->getMessage(),
    //         ]);
    //     }
    // }
    // public function manualFullBackup()
    // {
    //     try {
    //         // Run the database backup
    //         // Artisan::call('backup:run');
    //         Artisan::queue('backup:run');

    //         // Path to the backup folder
    //         $backupPath = storage_path('app/private/HSBR Starter Kit');
    //         $files = collect(File::files($backupPath))->sortByDesc(function ($file) {
    //             return $file->getMTime();
    //         });

    //         $customFileName = null;

    //         // Create a new file from the most recent backup
    //         if ($files->isNotEmpty()) {
    //             $latestBackupFile = $files->first();

    //             // Generate a custom file name
    //             $timeZoneName = Auth::user()->timeZone->time_zone ?? 'UTC'; // Default to 'UTC' if timeZone is null
    //             $time = now()->setTimezone($timeZoneName)->format('d-M-Y_h-i_s_A'); // Replace invalid ':' with '_'
    //             $customFileName = 'custom-full-backup-' . $time . '-' . str_replace(['/', ' '], '_', $timeZoneName) . '.zip';

    //             $customFilePath = $backupPath . '/' . $customFileName;

    //             // Create a new file with the custom name
    //             File::copy($latestBackupFile->getPathname(), $customFilePath);
    //         }
    //         // {{ route('backups.download.backup', ['file' => urlencode($file['name'])]) }}
    //         $file = 'HSBR Starter Kit/' . $customFileName;
    //         $downloadUrl = route('backups.download.backup', urlencode($file));

    //         return response()->json([
    //             'success' => true,
    //             'fileName' => $customFileName,
    //             'downloadUrl' => $downloadUrl,
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Failed to complete database backup: ' . $e->getMessage(),
    //         ]);
    //     }
    // }




    public function customBackup(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'backup_name' => 'required|string',
            'include' => 'required|string', // Expecting a comma-separated list
            'keep_all_backups_for_days' => 'required|integer|min:1',
        ]);

        // Convert the include string to an array
        $include = array_map('trim', explode(',', $validated['include']));

        // Update configuration at runtime
        Config::set('backup.backup.name', $validated['backup_name']);
        Config::set('backup.backup.source.files.include', $include);
        Config::set('backup.cleanup.default_strategy.keep_all_backups_for_days', $validated['keep_all_backups_for_days']);
        Config::set('app.name', 'My Custom Backup App Name');


        // Persist changes to a database or other storage if necessary

        // Flash a success message and redirect back
        return redirect()->back()->with('success', 'Backup settings updated successfully.');
    }
}
