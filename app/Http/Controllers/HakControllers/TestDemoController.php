<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppRequests\StoreAndUpdateTestDemoRequest;
use App\Models\HakModels\TestDemo;
use App\Models\HakModels\Settings;
use Illuminate\Http\Request;
use App\Models\HakModels\Activity;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TestDemoController extends Controller
{
    private $headName = 'Test Demos';
    private $routeName = 'test.demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';
    private $camelCase = 'testDemo';
    private $model = 'TestDemo';


    public function index()
    {
        $testDemos = TestDemo::all();
        $settings = Settings::where('model', $this->model)->get();

        $createdByUsers = $testDemos->sortBy('created_by')->pluck('created_by')->unique();
        $updatedByUsers = $testDemos->sortBy('updated_by')->pluck('updated_by')->unique();



        $defaultCount = TestDemo::withTrashed()->where('default', 1)->count();

        $message_error = null;

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
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'testDemos' => $testDemos,
                'defaultCount' => $defaultCount,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
                'message_error' => $message_error,
                'settings' => $settings,
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
                            <a href="' . route($this->routeName . '.show', encrypt($testDemo->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route($this->routeName . '.pdf', encrypt($testDemo->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route($this->routeName . '.edit', encrypt($testDemo->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($testDemo->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($testDemo->id) . '" data-value="' . $testDemo->name . '" data-default="' . $testDemo->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($testDemo->id) . '" data-value="' . $testDemo->name . '" data-default="' . $testDemo->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($testDemo->deleted_at) {
                    $action .= '<a href="' . route($this->routeName . '.restore', encrypt($testDemo->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
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
        return view('backend.test_demos.create')->with(
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

        foreach ($tableData as $row) {
            TestDemo::create($row);
        }

        return response()->json([
            'success' => true,
            'message_success' => 'Data imported successfully.',
            'redirect_url' => route($this->routeName . '.index')
        ]);
    }

    public function show($testDemo)
    {


        $testDemo = TestDemo::withTrashed()->find(decrypt($testDemo));
        $activityLog = Activity::where('subject_id', $testDemo->id)
            ->where('subject_type', 'App\Models\HakModels\TestDemo')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.test_demos.show')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'testDemo' => $testDemo,
                'activityLog' => $activityLog,
            ]
        );
    }

    public function edit($testDemo)
    {
        $testDemo = TestDemo::withTrashed()->find(decrypt($testDemo));

        return view('backend.test_demos.edit')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'testDemo' => $testDemo
            ]
        );
    }
    public function update(StoreAndUpdateTestDemoRequest $request, $id)
    {

        $id = decrypt($id);
        $testDemo = TestDemo::withTrashed()->find($id);

        $testDemo->code  = $request->code;
        $testDemo->name = $request->name;
        $testDemo->local_name = $request->local_name;
        $testDemo->description = $request->description;

        if ($request->default == 1) {
            TestDemo::withTrashed()->where('default', 1)->update(['default' => null]);
            $testDemo->default = 1;
        } else {
            $testDemo->default = 0;
        }
        // dd($request->status);
        $testDemo->status = $request->status == 1 ? 1 : null;


        $testDemo->updated_by = Auth::user()->id;
        $testDemo->update();

        $defaultCount = TestDemo::withTrashed()->where('default', 1)->count();
        $message_error = null;
        $message_warning = null;

        if ($defaultCount > 1) {
            $message_error = "Default Count is more than " . $defaultCount;
        } elseif ($defaultCount == 0) {
            TestDemo::where('status', 1)->limit(1)->update(['default' => 1]);
            $message_warning = "Default value Automatic Selected first Active One";
        }

        return redirect()->route($this->routeName . '.index')->with(
            [
                'message_success' => 'TestDemo Updated Successfully',
                'message_error' => $message_error,
                'message_warning' => $message_warning,
            ]
        );
    }
    public function destroy($id)
    {
        try {
            $testDemo = TestDemo::findOrFail(decrypt($id));

            if (is_null($testDemo->default)) {
                $testDemo->delete();
                return response()->json(['success' => true, 'message' => 'TestDemo Soft Deleted Successfully']);
            }

            return response()->json(['success' => false, 'error' => 'Please change the Default value before "Soft Deleting".']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }

    public function forceDestroy($id)
    {
        try {
            $testDemo = TestDemo::withTrashed()->findOrFail(decrypt($id));

            if (is_null($testDemo->default)) {
                $testDemo->forceDelete();
                return response()->json(['success' => true, 'message' => 'TestDemo Hard Deleted Successfully']);
            }

            return response()->json(['success' => false, 'error' => 'Please change the Default value before "Hard Deleting".']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }
    public function restore($id)
    {

        $testDemo  = TestDemo::withTrashed()->findOrFail(decrypt($id));
        $testDemo->restore();
        return redirect()->route($this->routeName . '.index')->with(
            [
                'message_update' => 'TestDemo Restored Successfully'
            ]
        );
    }

    public function testDemosPDF($id)
    {
        $id = decrypt($id);
        $testDemo = TestDemo::withTrashed()->find($id);
        $testDemoCode = $testDemo->code;
        $pdfName = 'Test Demo-' . $testDemoCode;

        $logoPath = public_path('app/images/logo/hsbr_logo_name_w.png');
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoBase64 = 'data:image/png;base64,' . $logoData;
        $paperSize = Settings::where('name', 'test_demo_pdf_paper_size')->first()->value;

        $data = [
            'pdfName' => $pdfName,
            'paperSize' => $paperSize,
            'testDemo' => $testDemo,
            'logoBase64' => $logoBase64,
        ];

        $pdf = Pdf::loadView('backend.test_demos.pdf', $data)->setPaper($paperSize, 'portrait')->setWarnings(false);
        return $pdf->download(filename: $pdfName . '.pdf');
    }
}
