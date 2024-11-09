<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\AppModels\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.app_views.user_managements.users.index')->with(
            []
        );
    }
    public function getUsers(Request $request)
    {
        $query = User::query();

        // Apply filters based on request inputs
        if ($request->has('name') && !empty($request->name)) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('email') && !empty($request->email)) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            // 'password' => 'required|min:6|confirmed'
        ]);
        $user = new User();


        $user->name  = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        if ($request->default) {
            User::where('default', 1)->update(['default' => null]);
        }

        $user->default = $request->default;
        // checking default -->


        if ($request->status == 0) {
            $user->status == 0;
        }

        $user->status = $request->status;

        $user->created_by = Auth::user()->id;
        $user->updated_by = Auth::user()->id;

        $user->save();




        return response()->json(data: ['message_store' => 'Form submitted successfully!']);
        // return redirect()->route('test-demos.index')->with(
        //     [
        //         'message_store' => 'TestDemo Created Successfully'
        //     ]
        // );
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
}
