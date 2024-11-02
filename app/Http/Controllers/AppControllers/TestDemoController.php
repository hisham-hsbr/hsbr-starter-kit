<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\AppModels\TestDemo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TestDemoController extends Controller
{
    private $headName = 'Test Demo';
    private $routeName = 'test-demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';


    public function index()
    {
        return view('backend.test_demos.index')->with(
            []
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.test_demos.create')->with(
            []
        );
    }
    public function getTestDemos(Request $request)
    {
        if ($request->ajax()) {
            $data = TestDemo::select(['id', 'name', 'email', 'created_at']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(TestDemo $testDemo)
    {
        //
    }
}