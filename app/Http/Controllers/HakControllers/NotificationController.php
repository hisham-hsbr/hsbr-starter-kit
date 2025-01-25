<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use App\Models\HakModels\Settings;
use App\Models\HakModels\User;
use App\Notifications\AppNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    private $headName = 'Notifications';
    private $routeName = 'notifications';
    private $permissionName = 'Notification';
    private $snakeName = 'notification';
    private $camelCase = 'notification';
    private $model = 'Notification';
    public function index()
    {

        $settings = Settings::where('model', $this->model)->get();

        return view('backend.hak_views.user_managements.notifications.index')->with(
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
    public function create()
    {
        $users = User::all();

        return view('backend.hak_views.user_managements.notifications.create')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'users' => $users,
            ]
        );
    }
    public function store(Request $request)
    {
        // Validate input fields
        Validator::make($request->all(), [
            'subject' => 'required',
            'body' => 'required',
        ])->validate();

        $subject = $request->subject;
        $body = $request->body;

        // User::find(1)->notify(new AppNotification($subject, $body));

        $userIds = $request->input('users', []);
        $users = User::whereIn('id', $userIds)->get();
        foreach ($users as $user) {
            $user->notify(new AppNotification($subject, $body));
        }


        return redirect()->route($this->routeName . '.index')->with('message_success', "Notification Created Successfully");
    }
    public function show()
    {
        return view('backend.hak_views.user_managements.notifications.show')->with(
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
    public function markAsRead(Request $request)
    {
        $notification = DatabaseNotification::find($request->id);

        if ($notification) {
            $notification->markAsRead(); // Mark notification as read
            return response()->json(['success' => true, 'read_at' => $notification->read_at]);
        }

        return response()->json(['success' => false, 'message' => 'Notification not found'], 404);
    }
    public function markAsUnread(Request $request)
    {
        $notification = DatabaseNotification::find($request->id);

        if ($notification && $notification->read_at !== null) {
            $notification->update(['read_at' => null]); // Mark as unread
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Notification not found or already unread'], 404);
    }
    public function unreadCount()
    {
        $count = Auth::user()->unreadNotifications->count();
        return response()->json(['success' => true, 'count' => $count]);
    }
}
