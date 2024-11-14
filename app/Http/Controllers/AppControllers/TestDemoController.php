<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppRequests\StoreAndUpdateTestDemoRequest;
use App\Imports\TestDemosImport;
use App\Models\AppModels\TestDemo;
use App\Models\AppModels\Activity;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TestDemoController extends Controller
{
    private $headName = 'Test Demos';
    private $routeName = 'test-demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';
    private $camelCase = 'testDemo';
    private $model = 'TestDemo';


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
                'model' => $this->model,
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

        return redirect()->back()->with(
            [
                'message_success' => 'TestDemo Created Successfully'
            ]
        );
    }

    public function testDemosExcelImport()
    {
        return view('backend.test_demos.import')->with(
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

    public function testDemosExcelSampleDownload()
    {
        $path = public_path('downloads/sample_excels/test_demos_import_sample.xlsx');
        return response()->download($path);
    }




    public function testDemosExcelUpload(Request $request)
    {
        $tableData = json_decode($request->input('table_data'), true);
        $validationErrors = [];

        foreach ($tableData as $index => $row) {
            $validator = Validator::make($row, [
                'code' => 'required|unique:test_demos,code',
                'name' => 'required',
                'status' => ['required', 'in:0,1'],
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->messages() as $field => $messages) {
                    $validationErrors["{$index}.{$field}"] = $messages;
                }
            }
        }

        if (!empty($validationErrors)) {
            return response()->json(['message_errors' => $validationErrors], 422);
        }

        // Create each row, 'created_by' and 'updated_by' are automatically set
        foreach ($tableData as $row) {
            TestDemo::create($row);
        }

        return response()->json([
            'success' => true,
            'message_success' => 'Data imported successfully.',
            'redirect_url' => route('test-demos.index')
        ]);
    }

    public function show($testDemo)
    {


        $testDemo = TestDemo::withTrashed()->find(decrypt($testDemo));
        $activityLog = Activity::where('subject_id', $testDemo->id)
            ->where('subject_type', 'App\Models\AppModels\TestDemo')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.test_demos.show')->with(
            [
                'testDemo' => $testDemo,
                'activityLog' => $activityLog,
                'camelCase' => $this->camelCase,
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($testDemo)
    {
        $testDemo = TestDemo::withTrashed()->find(decrypt($testDemo));

        return view('backend.test_demos.edit')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'testDemo' => $testDemo
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAndUpdateTestDemoRequest $request, $id)
    {

        $id = decrypt($id);
        $testDemo = TestDemo::withTrashed()->find($id);

        $testDemo->code  = $request->code;
        $testDemo->name = $request->name;
        $testDemo->local_name = $request->local_name;
        $testDemo->description = $request->description;


        // Handle default value
        if ($request->default == 1) {
            // Set all other entries to null for default
            TestDemo::withTrashed()->where('default', 1)->update(['default' => null]);
            $testDemo->default = 1;
        } else {
            $testDemo->default = 0;
        }



        if ($request->status == 0) {
            $testDemo->status == 0;
        } else {

            $testDemo->status = $request->status;
        }


        $testDemo->updated_by = Auth::user()->id;
        $testDemo->update();
        // dd($testDemo);

        // Check for default count consistency
        $defaultCount = TestDemo::withTrashed()->where('default', 1)->count();
        $message_error = null;
        $message_warning = null;

        if ($defaultCount > 1) {
            $message_error = "Default Count is more than " . $defaultCount;
        } elseif ($defaultCount == 0) {
            TestDemo::where('status', 1)->limit(1)->update(['default' => 1]);
            $message_warning = "Default value Automatic Selected first Active One";
        }

        return redirect()->route('test-demos.index')->with(
            [
                'message_success' => 'TestDemo Updated Successfully',
                'message_error' => $message_error,
                'message_warning' => $message_warning,
            ]
        );
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

    public function testDemosPDF($id)
    {
        $id = decrypt($id);
        $testDemo = TestDemo::withTrashed()->find($id);
        $pdf_name = 'Job Number TF-';
        $data = [
            'testDemo' => $testDemo,
        ];
        // return view('back_end.fixancare.services.generate_pdf.blade',compact('services','products','job_types','job_statuses','work_statuses','complaints'));

        $pdf = Pdf::loadView('backend.test_demos.pdf', $data)->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->download(filename: $pdf_name . '.pdf');
    }
}
