<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use App\Models\HakModels\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;


class PermissionController extends Controller
{
    private $headName = 'Permissions';
    private $routeName = 'permissions';
    private $permissionName = 'Permission';
    private $snakeName = 'permission';
    private $camelCase = 'permission';
    private $model = 'Permission';


    public function index()
    {
        $permissions = Permission::all();
        $createdByUsers = $permissions->sortBy('created_by')->pluck('created_by')->unique();
        $updatedByUsers = $permissions->sortBy('updated_by')->pluck('updated_by')->unique();



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



        return view('backend.hak_views.user_managements.permissions.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'permissions' => $permissions,
                'defaultCount' => $defaultCount,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
                'message_error' => $message_error,
            ]
        );
    }

    public function permissionsRefresh()
    {
        $permissions = Permission::all();
        return response()->json(['permissions' => $permissions]);
    }

    public function permissionsGet(Request $request)
    {
        $defaultCount = Permission::withTrashed()->where('default', 1)->count();
        $permissions = Permission::withTrashed()->get();


        return Datatables::of($permissions)
            ->setRowId(function ($permission) {
                return $permission->id;
            })

            ->setRowClass(function ($permission) use ($defaultCount) {
                return ($defaultCount > 1 && $permission->default == 1) ? 'text-danger' : '';
            })
            ->addIndexColumn()
            ->addColumn('action', function (Permission $permission) {

                $action = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                        <div class="dropdown-menu" role="menu">
                            <a href="' . route($this->routeName . '.show', encrypt($permission->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route($this->routeName . '.pdf', encrypt($permission->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route($this->routeName . '.edit', encrypt($permission->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($permission->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($permission->id) . '" data-value="' . $permission->name . '" data-default="' . $permission->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($permission->id) . '" data-value="' . $permission->name . '" data-default="' . $permission->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($permission->deleted_at) {
                    $action .= '<a href="' . route($this->routeName . '.restore', encrypt($permission->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
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
    public function create()
    {
        return view('backend.hak_views.user_managements.permissions.create')->with(
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
}
