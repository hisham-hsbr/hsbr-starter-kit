<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\AppModels\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    private $headName = 'Activity Logs';
    private $routeName = 'activity.logs';
    private $permissionName = 'Activity Log';
    private $snakeName = 'activity_log';
    private $camelCase = 'activityLog';
    private $model = 'ActivityLog';
    public function index()
    {
        $activityLogs = Activity::all();
        return view('backend.app_views.user_managements.activity_logs.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'activityLogs' => $activityLogs,
            ]
        );
    }
    public function show($id)
    {
        $activityLog = Activity::find($id);
        // dd($activityLog);
        $users = User::all();
        return view('backend.app_views.user_managements.activity_logs.show')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'activityLog' => $activityLog,
                'users' => $users,
            ]
        );
    }
    public function activityLogsGet()
    {

        $activity = Activity::all();
        return Datatables::of($activity)

            ->setRowId(function ($activity) {
                return $activity->id;
            })

            ->addIndexColumn()
            ->addColumn('viewLink', function (Activity $activity) {

                $viewLink = '<a href="' . route('activity.logs.show', $activity->id) . '" class="ml-2"><i class="fa-solid fa fa-eye"></i></a>';
                return $viewLink;
            })
            ->addColumn('causer_name', function ($activity) {
                return $activity->causer_id ? $activity->causer->name ?? 'Unknown User' : 'N/A';
            })

            ->rawColumns(['status', 'viewLink', 'causer_by_name', 'created_at_formatted'])
            ->toJson();
    }
    public function destroy($id)
    {
        //
    }
    public function forceDestroy($id)
    {
        //
    }
}
