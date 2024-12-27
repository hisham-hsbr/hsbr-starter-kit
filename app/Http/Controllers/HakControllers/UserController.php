<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use App\Mail\UserEmailVerificationMail;
use App\Mail\UserSendOTPMail;
use App\Mail\UserWelcomeWithOTPMail;
use App\Models\HakModels\Activity;
use App\Models\HakModels\Permission;
use App\Models\HakModels\Role;
use App\Models\HakModels\TimeZone;
use App\Models\HakModels\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    private $headName = 'Users';
    private $routeName = 'users';
    private $permissionName = 'User';
    private $snakeName = 'user';
    private $camelCase = 'user';
    private $model = 'User';
    public function index()
    {
        $users = User::withTrashed()->where('id', '!=', Auth::user()->id)->get();

        $createdByUsers = $users->sortBy('created_by')->pluck('created_by')->unique();
        $updatedByUsers = $users->sortBy('updated_by')->pluck('updated_by')->unique();

        return view('backend.hak_views.user_managements.users.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }
    public function usersGet(Request $request)
    {
        $defaultCount = User::withTrashed()->where('default', 1)->count();

        // Get all users including trashed, but exclude the authenticated user
        $users = User::withTrashed()->where('id', '!=', Auth::user()->id)->get();

        return Datatables::of($users)
            ->setRowId(function ($user) {
                return $user->id;
            })

            // Add row class based on condition
            ->setRowClass(function ($user) use ($defaultCount) {
                return ($defaultCount > 1 && $user->default == 1) ? 'text-danger' : '';
            })
            ->addIndexColumn()
            ->addColumn('action', function (User $user) {

                $action = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                        <div class="dropdown-menu" role="menu">
                            <a href="' . route('users.show', encrypt($user->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route('users.pdf', encrypt($user->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route('users.edit', encrypt($user->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($user->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($user->id) . '" data-value="' . $user->name . '" data-default="' . $user->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($user->id) . '" data-value="' . $user->name . '" data-default="' . $user->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($user->deleted_at) {
                    $action .= '<a href="' . route('users.restore', encrypt($user->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
                }

                $action .= '
                        </div>
                    </div>
                ';

                return $action;
            })->editColumn('emailVerified', function (User $user) {

                $verified = '<span style="background-color: #190482;color: white;padding: 3px;width:100px;">Verified</span>';
                $pending = '<span style="background-color: #C70039;color: white;padding: 3px;width:100px;">Pending</span>';

                $verifiedStatus = $user->email_verified_at ? $verified : $pending;

                return $verifiedStatus;
            })



            ->rawColumns(['action', 'status_with_icon', 'emailVerified'])
            ->toJson();
    }


    public function create()
    {
        $timeZones = TimeZone::where('status', 1)->get();
        if (Auth::user()->hasRole('Developer')) {
            $roles = Role::all();
        } else {
            $roles = Role::where('status', 1)
                ->where('id', '>', 1)
                ->get();
        }
        $permissions = Permission::where('status', 1)->get();
        $permissionsGroupBy = Permission::all()->groupBy('parent');
        return view('backend.hak_views.user_managements.users.create')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'timeZones' => $timeZones,
                'roles' => $roles,
                'permissions' => $permissions,
                'permissionsGroupBy' => $permissionsGroupBy,
            ]
        );
    }

    public function store(Request $request)
    {
        // Validate input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|same:password_confirm',
            'time_zone_id' => 'required',
            'gender' => 'required',
            'roles' => 'required|array'
        ]);

        // Generate password
        $password = $this->generatePassword();

        if ($validator->fails()) {
            // For AJAX request, return JSON response
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // For non-AJAX request, redirect back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save data in the database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->time_zone_id = $request->time_zone_id;
        $user->gender = $request->gender;

        if ($request->default) {
            User::where('default', 1)->update(['default' => null]);
        }
        if ($request->send_email_verification) {
            $user->otp = 1;
        }

        $user->default = $request->default ? 1 : 0;
        $user->status = $request->status ? 1 : 0;
        $user->created_by = Auth::user()->id;
        $user->updated_by = Auth::user()->id;

        $user->save();

        // Retrieve roles from the database based on the IDs provided in the request
        $roles = Role::whereIn('id', $request->input('roles'))->pluck('name')->toArray();

        // Assign roles to the user
        $user->assignRole($roles);

        // Assign permissions if provided
        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->input('permissions'))->pluck('name')->toArray();
            $user->givePermissionTo($permissions);
        }



        if ($request->send_email_verification) {
            $email = $user->email;
            $otp = $password;
            $userName = $user->name;
            $loginUrl = url('/login') . '?email=' . urlencode($email) . '&password=' . urlencode($password);

            $verificationUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                ['id' => encrypt($user->id), 'hash' => sha1($user->email)]
            );

            Mail::to($user->email)->send(new UserWelcomeWithOTPMail($userName, $otp, $loginUrl, $email, $verificationUrl));
        }

        return redirect()->route($this->routeName . '.index')
            ->with('message_success', "{$request->name} - Role Updated Successfully");
    }


    public function show($user)
    {


        $user = User::withTrashed()->find(decrypt($user));
        $activityLog = Activity::where('subject_id', $user->id)
            ->where('subject_type', 'App\Models\HakModels\User')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.hak_views.user_managements.users.show')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'user' => $user,
                'activityLog' => $activityLog,
            ]
        );
    }

    public function edit(string $user)
    {
        $user = User::withTrashed()->find(id: decrypt($user));
        $timeZones = TimeZone::where('status', 1)->get();
        if (Auth::user()->hasRole('Developer')) {
            $roles = Role::all();
        } else {
            $roles = Role::where('status', 1)
                ->where('id', '>', 1)
                ->get();
        }
        $permissions = Permission::where('status', 1)->get();
        $permissionsGroupBy = Permission::all()->groupBy('parent');



        return view('backend.hak_views.user_managements.users.edit')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'user' => $user,
                'timeZones' => $timeZones,
                'roles' => $roles,
                'permissions' => $permissions,
                'permissionsGroupBy' => $permissionsGroupBy,
            ]
        );
    }


    public function update(Request $request, string $id)
    {
        $id = decrypt($id);

        // Validate input fields
        $request->validate([
            'name' => 'required',
            'time_zone_id' => 'required',
            'gender' => 'required',
            'email' => "required|email|unique:users,email,$id",
            'roles' => 'required'
        ]);

        if ($request->changePassword == 1) {
            $request->validate([
                'password' => 'required|same:password_confirm',
            ]);
        }

        // Find the authenticated user
        $user = User::find($id);

        // Update basic fields
        $user->name = $request->name;
        $user->time_zone_id = $request->time_zone_id;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->status = $request->status == 1 ? 1 : null;

        // Update password if needed
        if ($request->changePassword == 1) {
            $user->password = Hash::make($request['password']);
        }

        // Prepare updated settings
        $settings = $user->settings; // Assume 'settings' is a JSON column

        if (!empty($settings)) {
            foreach ($settings as $key => $value) {
                // Handle checkboxes (if not checked, default to 0)
                if ($value['type'] === 'checkbox') {
                    $settings[$key]['value'] = $request->has($key) ? 1 : 0;
                } else {
                    // Update other types of settings
                    if ($request->has($key)) {
                        $settings[$key]['value'] = $request->input($key);
                    }
                }
            }
        }

        // Update personal_settings if applicable
        if ($request->personal_settings == 1) {
            $settings['personal_settings']['value'] = 1;
        } elseif ($request->personal_settings === null) {
            $settings['personal_settings']['value'] = null;
        }

        $user->settings = $settings;

        // Clear email_verified_at if email is changed
        if ($request->email !== $user->email) {
            $user->email_verified_at = null;
        }

        $user->updated_by = Auth::user()->id;

        // Save user updates
        $user->update();

        // Clear existing roles and permissions
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        DB::table('model_has_permissions')->where('model_id', $id)->delete();

        // Assign roles by name
        $roles = Role::whereIn('id', $request->input('roles'))->pluck('name')->toArray();
        $user->assignRole($roles);

        // Assign permissions by name
        if ($request->has('permissions') && is_array($request->input('permissions'))) {
            $permissions = Permission::whereIn('id', $request->input('permissions'))->pluck('name')->toArray();
            $user->syncPermissions($permissions);
        } else {
            $user->syncPermissions([]);
        }


        return redirect()->route($this->routeName . '.index')
            ->with('message_success', "{$request->name} - User Updated Successfully");
    }


    public function profileEdit()
    {
        $timeZones = TimeZone::where('status', 1)->get();
        $headName = 'Profile';
        $routeName = 'user.profile';
        $message_warning = null;
        if (Auth::user()->otp == 1) {
            session()->flash('alert_password_change', true);
        }
        return view('backend.hak_views.user_managements.users.profile')->with(
            [
                'headName' => $headName,
                'routeName' => $routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'timeZones' => $timeZones,
            ]
        );
    }

    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;

        // Validate input fields
        $request->validate([
            'name' => 'required',
            'time_zone_id' => 'required',
            'gender' => 'required',
            'email' => "required|email|unique:users,email,$id",
        ]);

        if ($request->changePassword == 1) {
            $request->validate([
                'password' => 'required|same:password_confirm',
            ]);
        }

        // Find the authenticated user
        $user = User::find($id);

        // Update basic fields
        $user->name = $request->name;
        $user->time_zone_id = $request->time_zone_id;
        $user->gender = $request->gender;
        $user->email = $request->email;

        // Update password if needed
        if ($request->changePassword == 1) {
            $user->password = Hash::make($request['password']);
        }

        // Prepare updated settings
        $settings = $user->settings; // Assume 'settings' is a JSON column

        if (!empty($settings)) {
            foreach ($settings as $key => $value) {
                // Handle checkboxes (if not checked, default to 0)
                if ($value['type'] === 'checkbox') {
                    $settings[$key]['value'] = $request->has($key) ? 1 : 0;
                } else {
                    // Update other types of settings
                    if ($request->has($key)) {
                        $settings[$key]['value'] = $request->input($key);
                    }
                }
            }
        }

        // Update personal_settings if applicable
        if ($user->settings['personal_settings']['value'] == 1) {
            $settings['personal_settings']['value'] = 1;
        } elseif ($user->settings['personal_settings']['value'] === null) {
            $settings['personal_settings']['value'] = null;
        }

        $user->settings = $settings;

        // Clear email_verified_at if email is changed
        if ($request->email !== Auth::user()->email) {
            $user->email_verified_at = null;
        }

        $user->updated_by = Auth::user()->id;

        // Save user updates
        $user->update();

        return back()->with('message_success', 'Profile Data Updated Successfully');
    }



    public function avatarUpdate(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validate file type and size
        ]);

        // Delete old avatar if it exists
        if ($oldAvatar = $request->user()->avatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        // Save new avatar
        $file_name = Auth::user()->email . '.jpg';
        $path = $request->file('avatar')->storeAs('images/avatars/users', $file_name, 'public');

        $request->user()->update(['avatar' => $path]);

        return response()->json(['message_success' => 'Profile Avatar Updated Successfully']);
    }

    public function avatarDelete(request $request)
    {
        $old_avatar = $request->user()->avatar;

        // dd($old_avatar);
        Storage::disk('public')->delete($old_avatar);

        $path = "";
        $id = Auth::user()->id;
        $id = decrypt($id);
        $user  = User::findOrFail($id);
        $user->avatar = $path;
        $user->update();

        return redirect()->back()->with('message_success', 'Profile Avatar Deleted');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail(decrypt($id));


            $user->delete();
            return response()->json(['success' => true, 'message' => 'User Soft Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }

    public function forceDestroy($id)
    {
        try {
            $user = User::withTrashed()->findOrFail(decrypt($id));


            $user->forceDelete();
            return response()->json(['success' => true, 'message' => 'User Hard Deleted Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }
    public function restore($id)
    {

        $user  = User::withTrashed()->findOrFail(decrypt($id));
        $user->restore();
        return redirect()->route($this->routeName . '.index')->with(
            [
                'message_update' => 'User Restored Successfully'
            ]
        );
    }
    public function resendEmailVerification($id, Request $request)
    {
        try {
            // Decrypt the ID
            $userId = decrypt($id);

            // Find the user by ID
            $user = User::findOrFail($userId);

            // Check if the email is already verified
            if ($user->hasVerifiedEmail()) {

                return back()->with(
                    [
                        'message_info' => 'This user has already verified their email address.'
                    ]
                );
            }
            $userName = $user->name;
            // Send the email verification notification
            $verificationUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                ['id' => encrypt($user->id), 'hash' => sha1($user->email)]
            );
            Mail::to($user->email)->send(new UserEmailVerificationMail($verificationUrl, $userName));
            return back()->with(
                [
                    'message_success' => 'Verification email sent successfully!'
                ]
            );
        } catch (\Exception $e) {
            // Handle any exceptions
            return back()->with(
                [
                    'message_error' => 'An error occurred while sending the verification email.'
                ]
            );
        }
    }


    public function checkEmail(Request $request) //email check on js validation
    {
        $email = $request->input('email');
        $encryptedUserId = $request->input('user_id'); // Get the encrypted user ID

        try {
            $userId = $encryptedUserId ? decrypt($encryptedUserId) : null; // Decrypt the user ID if provided
        } catch (\Exception $e) {
            return response()->json(['unique' => false]); // Invalid encrypted ID, fail validation
        }

        // Check if the email exists for another user
        $isUnique = !User::where('email', $email)
            ->when($userId, function ($query, $userId) {
                return $query->where('id', '!=', $userId); // Exclude the current user's ID
            })
            ->exists();

        return response()->json(['unique' => $isUnique]);
    }

    public function generatePassword()
    {
        $charset = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789';
        $password = '';
        $length = 6;

        for ($i = 0; $i < $length; $i++) {
            $password .= $charset[random_int(0, strlen($charset) - 1)];
        }

        return $password;
    }
    public function sendOTP($id)
    {
        try {
            $userId = decrypt($id);
            $user = User::findOrFail($userId);
            $otp = $this->generatePassword();
            $email = $user->email;
            $userName = $user->name;

            $user = User::find($userId);

            // Update basic fields
            $user->otp = 1;
            $user->password = $user->password = Hash::make($otp);
            $user->update();



            // Generate login URL
            $loginUrl = url('/login') . '?email=' . urlencode($email) . '&password=' . urlencode($otp);

            // Send email
            Mail::to($email)->send(new UserSendOTPMail($loginUrl, $userName, $otp));

            // Optional: Add logic to return a response or handle errors

            return redirect()->back()->with('message_success', 'OTP sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message_error', 'Failed to send OTP. Please try again.');
        }
    }
}
