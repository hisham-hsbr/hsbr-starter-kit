<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;

use App\Models\HakModels\TimeZone;
use Illuminate\Http\Request;

class TimeZoneController extends Controller
{
    private $headName = 'Test Demo';
    private $routeName = 'test-demos';
    private $permissionName = 'Test Demo';
    private $snakeName = 'test_demo';


    public function index()
    {
        //
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
    public function show(TimeZone $timeZone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimeZone $timeZone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimeZone $timeZone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeZone $timeZone)
    {
        //
    }
}
