<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use App\Models\HakModels\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\HakModels\Activity;
use App\Models\HakModels\Permission;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    private $headName = 'Roles';
    private $routeName = 'roles';
    private $permissionName = 'Role';
    private $snakeName = 'role';
    private $camelCase = 'role';
    private $model = 'Role';
    public function index()
    {
        $roles = Role::withTrashed()
            ->with(['users', 'permissions'])
            ->where('id', '!=', 1)
            ->get();

        $createdByUsers = $roles->sortBy('created_by')->pluck('created_by')->unique();
        $updatedByUsers = $roles->sortBy('updated_by')->pluck('updated_by')->unique();

        $defaultCount = Permission::withTrashed()->where('default', 1)->count();

        $message_error = null;

        if ($defaultCount > 1) {
            $message_error = "Default Count is more than " . $defaultCount;
            session()->flash('message_error', $message_error);
        }

        if ($defaultCount == 0) {
            $message_error = "Please set a Default value";
            session()->flash('message_error', $message_error);
        }

        return view('backend.hak_views.user_managements.roles.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'defaultCount' => $defaultCount,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
                'message_error' => $message_error,
            ]
        );
    }
    public function rolesGet(Request $request)
    {
        $defaultCount = Role::withTrashed()->where('default', 1)->count();
        $roles = Role::withTrashed()
            ->with(['users', 'permissions'])
            ->where('id', '!=', 1)
            ->get();

        return Datatables::of($roles)
            ->setRowId(function ($role) {
                return $role->id;
            })

            // Add row class based on condition
            ->setRowClass(function ($role) use ($defaultCount) {
                return ($defaultCount > 1 && $role->default == 1) ? 'text-danger' : '';
            })
            ->addIndexColumn()

            // Add 'Users Count' column
            ->addColumn('users_count', function ($role) {
                return '<span class="badge badge-primary badge-pill">' . $role->users->count() . ' Users</span>';
            })

            // Add 'Permissions Count' column
            ->addColumn('permissions_count', function ($role) {
                return '<span class="badge badge-warning badge-pill">' . $role->permissions->count() . ' Permissions</span>';
            })

            // Add action column
            ->addColumn('action', function (Role $role) {
                $action = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                        <div class="dropdown-menu" role="menu">
                            <a href="' . route($this->routeName . '.show', encrypt($role->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route($this->routeName . '.pdf', encrypt($role->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route($this->routeName . '.edit', encrypt($role->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($role->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($role->id) . '" data-value="' . $role->name . '" data-default="' . $role->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($role->id) . '" data-value="' . $role->name . '" data-default="' . $role->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($role->deleted_at) {
                    $action .= '<a href="' . route($this->routeName . '.restore', encrypt($role->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
                }

                $action .= '
                        </div>
                    </div>
                ';

                return $action;
            })

            ->rawColumns(['action', 'users_count', 'permissions_count', 'status_with_icon'])
            ->toJson();
    }

    public function rolesRefresh()
    {
        $roles = Role::all(); // Fetch updated roles
        return response()->json(['roles' => $roles]);
    }


    public function create()
    {
        $permissions = Permission::all()->groupBy('parent');

        return view('backend.hak_views.user_managements.roles.create')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'permissions' => $permissions
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
            'permission.*' => 'exists:permissions,id',
        ])->validate();

        // Create the role
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status ?? 0,
            'default' => $request->default ?? 0,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'guard_name' => 'web', // Ensure the guard matches your setup
        ]);

        // Sync permissions
        $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('name')->toArray();
        $role->syncPermissions($permissions);


        return redirect()->route($this->routeName . '.index')->with('message_success', "{$request->name} - Role Created Successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show($role)
    {


        $role = Role::withTrashed()->find(decrypt($role));
        $activityLog = Activity::with('causer')
            ->where('subject_id', $role->id)
            ->where('subject_type', 'App\Models\HakModels\Role')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.hak_views.user_managements.roles.show')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'role' => $role,
                'activityLog' => $activityLog,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $role)
    {
        $role = Role::withTrashed()->find(decrypt($role));
        $permissions = Permission::all()->groupBy('parent');



        return view('backend.hak_views.user_managements.roles.edit')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'role' => $role,
                'permissions' => $permissions,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = decrypt($id);

        Validator::make($request->all(), [
            'name' => "required|unique:roles,name,$id",
            'permission' => 'required|array',
        ])->validate();

        $role = Role::find($id);
        $role->name = $request->name;
        $role->description = $request->description;

        if ($request->status == 0) {
            $role->status = 0;
        } else {
            $role->status = $request->status;
        }



        // Update the role
        $role->update();

        // Fetch permissions by their IDs and get their names
        $permissions = Permission::whereIn('id', $request->permission)->pluck('name')->toArray();

        // Sync permissions by their names
        $role->syncPermissions($permissions);
        return redirect()->route($this->routeName . '.index')->with('message_success', "{$request->name} - Role Updated Successfully");
    }
    public function destroy($id)
    {
        try {
            $role = Role::findOrFail(decrypt($id));

            if (is_null($role->default)) {
                $role->delete();
                return response()->json(['success' => true, 'message' => 'Role Soft Deleted Successfully']);
            }

            return response()->json(['success' => false, 'error' => 'Please change the Default value before "Soft Deleting".']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }

    public function forceDestroy($id)
    {
        try {
            $role = Role::withTrashed()->findOrFail(decrypt($id));

            if (is_null($role->default)) {
                $role->forceDelete();
                return response()->json(['success' => true, 'message' => 'Role Hard Deleted Successfully']);
            }

            return response()->json(['success' => false, 'error' => 'Please change the Default value before "Hard Deleting".']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }
    public function restore($id)
    {

        $role  = Role::withTrashed()->findOrFail(decrypt($id));
        $role->restore();
        return redirect()->route($this->routeName . '.index')->with(
            [
                'message_update' => 'Role Restored Successfully'
            ]
        );
    }
}
