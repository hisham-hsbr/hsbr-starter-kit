<?php

namespace App\Http\Controllers\HakControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class JobQueueController extends Controller
{
    public function index()
    {
        // Logic to display or manage job queues
        // Example: Return a view or JSON response
        return view('backend.job_queues.job-queues');
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
