<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use App\Models\HakModels\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\HakModels\Settings;


class BackendController extends Controller
{
    private $headName = 'Dashboards';
    private $routeName = 'dashboard';
    private $permissionName = 'Dashboard';
    private $snakeName = 'dashboard';
    private $camelCase = 'dashboard';
    private $model = 'Dashboard';

    public function dashboard()
    {
        if (Auth::user()->otp == 1) {
            session()->flash('alert_password_change', true);
        }
        // $settings = Settings::all();
        $settings = Settings::where('model', $this->model)->get();




        $failedJobs = DB::table('failed_jobs')->count();
        return view('backend.dashboard')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,
                'settings' => $settings,
            ]
        );
    }
    public function getDashboardStats()
    {
        $userCount = User::withTrashed()->count();
        $inActiveUserCount = User::withTrashed()->where('status', null)->count();
        $deletedUserCount = User::withTrashed()->where('deleted_at', '!=', null)->count();
        $pendingEmailVerifications = User::withTrashed()->where('email_verified_at', null)->count();
        $pendingJobs = DB::table('jobs')->count();
        $failedJobs = DB::table('failed_jobs')->count();

        return response()->json([
            'userCount' => $userCount,
            'inActiveUserCount' => $inActiveUserCount,
            'deletedUserCount' => $deletedUserCount,
            'pendingEmailVerifications' => $pendingEmailVerifications,
            'failedJobs' => $failedJobs,
            'pendingJobs' => $pendingJobs
        ]);
    }

    public function starter()
    {
        return view('backend.start')->with(
            []
        );
    }
}
