<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppRequests\StoreAndUpdateTestDemoRequest;
use App\Models\AppModels\TestDemo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TestDemoController extends Controller
{
    private $headName = 'Test Demo';
    private $routeName = 'test-demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';


    public function index()
    {
        $testDemos = TestDemo::all();
        $createdByUsers = $testDemos->sortBy('created_by')->pluck('created_by')->unique();
        $updatedByUsers = $testDemos->sortBy('updated_by')->pluck('updated_by')->unique();



        $defaultCount = TestDemo::withTrashed()->where('default', 1)->count();

        $message_error = null; // Initialize the message variable

        if ($defaultCount > 1) {
            $message_error = "Default Count is more than " . $defaultCount;
            session()->flash('message_error', $message_error);
        }

        if ($defaultCount == 0) {
            $message_error = "Please set a Default value";
            session()->flash('message_error', $message_error);
        }


        return view('backend.test_demos.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'testDemos' => $testDemos,
                'defaultCount' => $defaultCount,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
                'message_error' => $message_error,
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function demo()
    {
        // dd('ddd');
        return view('backend.test_demos.test')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                // 'testDemos' => $testDemos,
            ]
        );
    }
    public function create()
    {
        return view('backend.test_demos.create')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                // 'testDemos' => $testDemos,
            ]
        );
    }



    public function testDemosGet(Request $request)
    {
        $defaultCount = TestDemo::withTrashed()->where('default', 1)->count();
        $testDemos = TestDemo::withTrashed()->get();


        return Datatables::of($testDemos)
            ->setRowId(function ($testDemo) {
                return $testDemo->id;
            })

            // Add row class based on condition
            ->setRowClass(function ($testDemo) use ($defaultCount) {
                return ($defaultCount > 1 && $testDemo->default == 1) ? 'text-danger' : '';
            })
            ->addIndexColumn()
            ->addColumn('action', function (TestDemo $testDemo) {

                $action = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                        <div class="dropdown-menu" role="menu">
                            <a href="' . route('test-demos.show', encrypt($testDemo->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route('test-demos.pdf', encrypt($testDemo->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route('test-demos.edit', encrypt($testDemo->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($testDemo->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($testDemo->id) . '" data-value="' . $testDemo->name . '" data-default="' . $testDemo->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($testDemo->id) . '" data-value="' . $testDemo->name . '" data-default="' . $testDemo->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($testDemo->deleted_at) {
                    $action .= '<a href="' . route('test-demos.restore', encrypt($testDemo->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
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
     * Store a newly created resource in storage.
     */
    public function store(StoreAndUpdateTestDemoRequest $request)
    {
        $testDemo = new TestDemo();


        $testDemo->code  = $request->code;
        $testDemo->name = $request->name;
        $testDemo->local_name = $request->local_name;

        if ($request->default) {
            TestDemo::where('default', 1)->update(['default' => null]);
        }

        $testDemo->default = $request->default;
        // checking default -->


        if ($request->status == 0) {
            $testDemo->status == 0;
        }

        $testDemo->status = $request->status;

        $testDemo->created_by = Auth::user()->id;
        $testDemo->updated_by = Auth::user()->id;

        $testDemo->save();

        return redirect()->route('test-demos.index')->with(
            [
                'message_store' => 'TestDemo Created Successfully'
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(TestDemo $testDemo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestDemo $testDemo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestDemo $testDemo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Decrypt the ID and find the TestDemo model
            $testDemo = TestDemo::findOrFail(decrypt($id));

            if (is_null($testDemo->default)) {
                $testDemo->delete();
                return response()->json(['success' => true, 'message' => 'TestDemo Soft Deleted Successfully']);
            }

            // If there's an issue with the default value
            return response()->json(['success' => false, 'error' => 'Please change the Default value before "Soft Deleting".']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }

    public function forceDestroy($id)
    {
        try {
            // Decrypt the ID and find the TestDemo model
            $testDemo = TestDemo::withTrashed()->findOrFail(decrypt($id));

            if (is_null($testDemo->default)) {
                $testDemo->forceDelete();
                return response()->json(['success' => true, 'message' => 'TestDemo Hard Deleted Successfully']);
            }

            // If there's an issue with the default value
            return response()->json(['success' => false, 'error' => 'Please change the Default value before "Hard Deleting".']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }
    public function restore($id)
    {

        $testDemo  = TestDemo::withTrashed()->findOrFail(decrypt($id));
        $testDemo->restore();
        return redirect()->route('test-demos.index')->with(
            [
                'message_update' => 'TestDemo Restored Successfully'
            ]
        );
    }
}
