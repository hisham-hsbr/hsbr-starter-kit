<?php

namespace App\Http\Controllers\HakControllers;

use App\Models\HakModels\Activity;
use App\Models\HakModels\Settings;
use App\Models\HakModels\UserDocument;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;



class UserDocumentController extends Controller
{
    private $headName = 'Test Demos';
    private $routeName = 'test.demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';
    private $camelCase = 'userDocument';
    private $model = 'TestDemo';


    public function index()
    {
        $userDocuments = UserDocument::all();
        $createdByUsers = $userDocuments->sortBy('createdBy')->pluck('createdBy')->unique();
        $updatedByUsers = $userDocuments->sortBy('updatedBy')->pluck('updatedBy')->unique();

        return view('backend.folder.test_demos.index')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'userDocuments' => $userDocuments,
                'createdByUsers' => $createdByUsers,
                'updatedByUsers' => $updatedByUsers,
            ]
        );
    }

    public function userDocumentsGet()
    {
        $defaultCount = UserDocument::withTrashed()->where('default', 1)->count();
        $userDocuments = UserDocument::withTrashed()->get();


        return Datatables::of($userDocuments)
            ->setRowId(function ($userDocument) {
                return $userDocument->id;
            })

            ->setRowClass(function ($userDocument) use ($defaultCount) {
                return ($defaultCount > 1 && $userDocument->default == 1) ? 'text-danger' : '';
            })
            ->addIndexColumn()
            ->addColumn('action', function (UserDocument $userDocument) {

                $action = '
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">Action</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                        <div class="dropdown-menu" role="menu">
                            <a href="' . route($this->routeName . '.show', encrypt($userDocument->id)) . '" class="ml-2" title="View Details"><i class="fa-solid fa fa-eye text-success"></i></a>
                            <a href="' . route($this->routeName . '.pdf', encrypt($userDocument->id)) . '" class="ml-2" title="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            <a href="' . route($this->routeName . '.edit', encrypt($userDocument->id)) . '" class="ml-2" title="Edit"><i class="fa-solid fa-edit text-warning"></i></a>';
                if ($userDocument->deleted_at == null) {
                    $action .= '
                    <button class="mb-1 btn btn-link delete-item_delete" data-item_delete_id="' . encrypt($userDocument->id) . '" data-value="' . $userDocument->name . '" data-default="' . $userDocument->default . '" type="submit" title="Soft Delete"><i class="fa-solid fa-eraser text-danger"></i></button>';
                }

                $action .= '
                            <button class="mb-1 btn btn-link delete-item_delete_force" data-item_delete_force_id="' . encrypt($userDocument->id) . '" data-value="' . $userDocument->name . '" data-default="' . $userDocument->default . '" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" type="submit" title="Hard Delete"><i class="fa-solid fa-trash-can text-danger"></i></button>';

                if ($userDocument->deleted_at) {
                    $action .= '<a href="' . route($this->routeName . '.restore', encrypt($userDocument->id)) . '" class="" title="Restore"><i class="fa-solid fa-trash-arrow-up"></i></a>';
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
        return view('backend.folder.test_demos.create')->with(
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

    public function store(Request $request)
    {
        $userDocument = new UserDocument();


        $userDocument->code  = $request->code;
        $userDocument->name = $request->name;
        $userDocument->local_name = $request->local_name;

        if ($request->default) {
            UserDocument::where('default', 1)->update(['default' => null]);
        }

        $userDocument->default = $request->default;


        if ($request->status == 0) {
            $userDocument->status == 0;
        }

        $userDocument->status = $request->status;

        $userDocument->created_by = Auth::user()->id;
        $userDocument->updated_by = Auth::user()->id;

        $userDocument->save();

        return redirect()->back()->with(
            [
                'message_success' => 'UserDocument Created Successfully'
            ]
        );
    }

    public function userDocumentsExcelImport()
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

    public function userDocumentsExcelSampleDownload()
    {
        $path = public_path('downloads/sample_excels/test_demos_import_sample.xlsx');
        return response()->download($path);
    }


    public function userDocumentsExcelUpload(Request $request)
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
            UserDocument::create($row);
        }

        return response()->json([
            'success' => true,
            'message_success' => 'Data imported successfully.',
            'redirect_url' => route($this->routeName . '.index')
        ]);
    }

    public function show(UserDocument $userDocument)
    {
        $userDocument = UserDocument::withTrashed()->find(decrypt($userDocument));
        $activityLog = Activity::where('subject_id', $userDocument->id)
            ->where('subject_type', 'App\Models\HakModels\UserDocument')
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

                'userDocument' => $userDocument,
                'activityLog' => $activityLog,
            ]
        );
    }

    public function edit(UserDocument $userDocument)
    {
        $userDocument = UserDocument::withTrashed()->find(decrypt($userDocument));

        return view('backend.test_demos.edit')->with(
            [
                'headName' => $this->headName,
                'routeName' => $this->routeName,
                'permissionName' => $this->permissionName,
                'snakeName' => $this->snakeName,
                'camelCase' => $this->camelCase,
                'model' => $this->model,

                'userDocument' => $userDocument
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $userDocument = UserDocument::withTrashed()->find($id);

        $userDocument->code  = $request->code;
        $userDocument->name = $request->name;
        $userDocument->local_name = $request->local_name;
        $userDocument->description = $request->description;

        if ($request->default == 1) {
            UserDocument::withTrashed()->where('default', 1)->update(['default' => null]);
            $userDocument->default = 1;
        } else {
            $userDocument->default = 0;
        }

        if ($request->status == 0) {
            $userDocument->status == 0;
        } else {

            $userDocument->status = $request->status;
        }

        $userDocument->updated_by = Auth::user()->id;
        $userDocument->update();

        $defaultCount = UserDocument::withTrashed()->where('default', 1)->count();
        $message_error = null;
        $message_warning = null;

        if ($defaultCount > 1) {
            $message_error = "Default Count is more than " . $defaultCount;
        } elseif ($defaultCount == 0) {
            UserDocument::where('status', 1)->limit(1)->update(['default' => 1]);
            $message_warning = "Default value Automatic Selected first Active One";
        }

        return redirect()->route($this->routeName . '.index')->with(
            [
                'message_success' => 'UserDocument Updated Successfully',
                'message_error' => $message_error,
                'message_warning' => $message_warning,
            ]
        );
    }

    public function destroy($id)
    {
        try {
            $userDocument = UserDocument::findOrFail(decrypt($id));

            if (is_null($userDocument->default)) {
                $userDocument->delete();
                return response()->json(['success' => true, 'message' => 'UserDocument Soft Deleted Successfully']);
            }

            return response()->json(['success' => false, 'error' => 'Please change the Default value before "Soft Deleting".']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }
    public function forceDestroy($id)
    {
        try {
            $userDocument = UserDocument::withTrashed()->findOrFail(decrypt($id));

            if (is_null($userDocument->default)) {
                $userDocument->forceDelete();
                return response()->json(['success' => true, 'message' => 'UserDocument Hard Deleted Successfully']);
            }

            return response()->json(['success' => false, 'error' => 'Please change the Default value before "Hard Deleting".']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'An error occurred. Please try again later.']);
        }
    }
    public function restore($id)
    {

        $userDocument  = UserDocument::withTrashed()->findOrFail(decrypt($id));
        $userDocument->restore();
        return redirect()->route($this->routeName . '.index')->with(
            [
                'message_update' => 'UserDocument Restored Successfully'
            ]
        );
    }

    public function userDocumentsPDF($id)
    {
        $id = decrypt($id);
        $userDocument = UserDocument::withTrashed()->find($id);
        $userDocumentCode = $userDocument->code;
        $pdfName = 'Test Demo-' . $userDocumentCode;

        $logoPath = public_path('app/images/logo/hsbr_logo_name_w.png');
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoBase64 = 'data:image/png;base64,' . $logoData;
        $paperSize = Settings::where('name', 'test_demo_pdf_paper_size')->first()->value;

        $data = [
            'pdfName' => $pdfName,
            'paperSize' => $paperSize,
            'userDocument' => $userDocument,
            'logoBase64' => $logoBase64,
        ];

        $pdf = Pdf::loadView('backend.test_demos.pdf', $data)->setPaper($paperSize, 'portrait')->setWarnings(false);
        return $pdf->download(filename: $pdfName . '.pdf');
    }
}
