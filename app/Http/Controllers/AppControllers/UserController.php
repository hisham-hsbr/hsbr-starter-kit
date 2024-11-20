<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\AppModels\TimeZone;
use App\Models\AppModels\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

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
        $users = User::withTrashed()->get();
        $createdByUsers = $users->sortBy('created_by')->pluck('created_by')->unique();
        $updatedByUsers = $users->sortBy('updated_by')->pluck('updated_by')->unique();
        return view('backend.app_views.user_managements.users.index')->with(
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
        $users = User::withTrashed()->get();


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
                            <a href="' . route('test.demos.show', encrypt($user->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route('test.demos.pdf', encrypt($user->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route('test.demos.edit', encrypt($user->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($user->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($user->id) . '" data-value="' . $user->name . '" data-default="' . $user->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($user->id) . '" data-value="' . $user->name . '" data-default="' . $user->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($user->deleted_at) {
                    $action .= '<a href="' . route('test.demos.restore', encrypt($user->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
                }

                $action .= '
                        </div>
                    </div>
                ';

                return $action;
            })


            ->rawColumns(['action', 'status_with_icon'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Save data in the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['success' => 'User created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function profileEdit()
    {
        $timeZones = TimeZone::where('status', 1)->get();
        $headName = 'Profile';
        $routeName = 'user.profile';
        return view('backend.app_views.user_managements.users.profile')->with(
            [
                'headName' => $headName,
                'routeName' => $routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'timeZones' => $timeZones
            ]
        );
    }

    // public function profileUpdate(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //     ]);

    //     $user = $request->user();
    //     $user->update($request->only('name', 'email'));

    //     return response()->json(['success' => true, 'message' => 'Profile updated successfully.']);
    // }
    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
            'name' => 'required',
            'time_zone_id' => 'required',
            'gender' => 'required',
            'email' => "required|unique:users,email,$id",
        ]);


        // $city_id = (DB::table('country_state_district_cities')->where('city', $request->city)->first())->id;

        if ($request->changePassword == 1) {
            $request->validate([
                'password' => 'required|same:password_confirm',
            ]);
        }

        $user = User::find($id);



        $user->name = $request->name;
        // $user->city_id  = $city_id;
        $user->time_zone_id  = $request->time_zone_id;
        // $user->email_verified_at  = $request->email_verified_at;
        $user->gender  = $request->gender;

        $user->email  = $request->email;

        if ($request->changePassword == 1) {
            $user->password = Hash::make($request['password']);
        }




        if ($request->layout_sidebar_collapse == 0) {
            $user->layout_sidebar_collapse == 0;
        }
        if ($request->layout_dark_mode == 0) {
            $user->layout_dark_mode == 0;
        }
        if ($request->default_status == 0) {
            $user->default_status == 0;
        }
        if ($request->default_time_zone == 0) {
            $user->default_time_zone == 0;
        }

        if (Auth::user()->settings['personal_settings'] == 1) {
            $personal_settings = 1;
        }
        if (Auth::user()->settings['personal_settings'] == null) {
            $personal_settings = null;
        }

        $user->settings = [
            'personal_settings' => $personal_settings,
            'layout_sidebar_collapse' => $request->layout_sidebar_collapse,
            'layout_dark_mode' => $request->layout_dark_mode,
            'default_status' => $request->default_status,
            'permission_view' => $request->permission_view,
        ];



        if ($request->email !== Auth::user()->email) {
            $user->email_verified_at = null;
        }

        $user->updated_by = Auth::user()->id;

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
}
