<?php

namespace App\Http\Controllers\HakControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\HakModels\Settings;

class JobQueueController extends Controller
{
    private $headName = 'Queues';
    private $routeName = 'queues';
    private $permissionName = 'Queue';
    private $snakeName = 'queue';
    private $camelCase = 'queue';
    private $model = 'Queue';
    public function index()
    {

        $settings = Settings::where('model', $this->model)->get();
        $jobs = DB::table('jobs')->get()->map(function ($job) {
            $payload = json_decode($job->payload, true);
            return [
                'id' => $job->id,
                'queue' => $job->queue,
                'attempts' => $job->attempts,
                'data' => $payload['data'] ?? [],
                'created_at' => $job->created_at,
            ];
        });
        $failedJobs = DB::table('failed_jobs')->get()->map(function ($job) {
            $payload = json_decode($job->payload, true);
            return [
                'id' => $job->id,
                'connection' => $job->connection,
                'queue' => $job->queue,
                'exception' => $job->exception,
                'data' => $payload['data'] ?? [],
                'failed_at' => $job->failed_at,
            ];
        });
        return view('backend.hak_views.app_managements.queue.index')->with([
            'headName' => $this->headName,
            'routeName' => $this->routeName,
            'permissionName' => $this->permissionName,
            'snakeName' => $this->snakeName,
            'camelCase' => $this->camelCase,
            'model' => $this->model,
            'settings' => $settings,
            'jobs' => $jobs,
            'failedJobs' => $failedJobs,
        ]);
    }
    public function controls()
    {
        $pendingJobs = DB::table('jobs')->count();
        $failedJobs = DB::table('failed_jobs')->count();

        return view('backend.hak_views.app_managements.queue.controls')->with([
            'headName' => $this->headName,
            'routeName' => $this->routeName,
            'permissionName' => $this->permissionName,
            'snakeName' => $this->snakeName,
            'camelCase' => $this->camelCase,
            'model' => $this->model,
            'pendingJobs' => $pendingJobs,
            'failedJobs' => $failedJobs,
        ]);
    }
    public function showQueueJobs()
    {

        return view('backend.hak_views.app_managements.queue.show')->with([
            'headName' => $this->headName,
            'routeName' => $this->routeName,
            'permissionName' => $this->permissionName,
            'snakeName' => $this->snakeName,
            'camelCase' => $this->camelCase,
            'model' => $this->model,
        ]);
    }
    public function retryJob()
    {
        try {
            Artisan::queue('queue:retry all');
            return back()->with('message_success', value: 'Retry completed successfully.');
        } catch (\Exception $e) {
            return back()->with('message_error', 'Failed to complete retry: ' . $e->getMessage());
        }
    }
    public function deleteFailedJobs()
    {
        try {
            Artisan::queue('queue:flush');
            return back()->with('message_success', value: 'Deleted Failed Jobs completed successfully.');
        } catch (\Exception $e) {
            return back()->with('message_error', 'Failed to complete this process: ' . $e->getMessage());
        }
    }
    public function fetchPendingJobs()
    {
        $jobs = DB::table('jobs')->select('id', 'queue', 'payload', 'attempts', 'created_at')->get();

        // Decode and format payload
        $jobs = $jobs->map(function ($job) {
            $job->decoded_payload = json_decode($job->payload, true);
            return $job;
        });

        return response()->json(['data' => $jobs]);
    }

    // Fetch failed jobs
    public function fetchFailedJobs()
    {
        $failedJobs = DB::table('failed_jobs')->select('id', 'queue', 'payload', 'exception', 'failed_at')->get();

        // Decode and format payload and exception
        $failedJobs = $failedJobs->map(function ($job) {
            $job->decoded_payload = json_decode($job->payload, true); // Decode JSON payload
            $job->formatted_exception = nl2br($job->exception); // Format exception for readability
            return $job;
        });

        return response()->json(['data' => $failedJobs]);
    }
}
