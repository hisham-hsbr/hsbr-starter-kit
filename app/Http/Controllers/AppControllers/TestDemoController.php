<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Models\AppModels\TestDemo;
use Illuminate\Http\Request;

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
        //
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
