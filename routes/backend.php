<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->middleware(['auth', 'verified'])->group(function () {

    Route::redirect('/admin', destination: '/admin/dashboard');
    Route::redirect('/dashboard', destination: '/admin/dashboard');
    Route::get('/admin/dashboard', 'App\Http\Controllers\AppControllers\BackendController@dashboard')->name('backend.dashboard');
    Route::get('/admin/start', 'App\Http\Controllers\AppControllers\BackendController@starter')->name('backend.starter');

    Route::get('/users', ['App\Http\Controllers\AppControllers\UserController@index'])->name('users.index');
    Route::get('/users/get', ['App\Http\Controllers\AppControllers\UserController@getUsers'])->name('users.get');


    //test demo
    Route::controller('App\Http\Controllers\AppControllers\TestDemoController')->prefix('/admin/test/demos')->name('test-demos.')->group(function () {
        Route::get('/', 'index')->name('index'); //->middleware('permission:Test Demos Read');
        Route::get('/create', 'create')->name('create'); //->middleware('permission:Test Demos Read');
        Route::post('/store', 'store')->name('store'); //->middleware('permission:Test Demos Read');
        Route::get('/edit/{id}', 'edit')->name('edit'); //->middleware('permission:Test Demos Read');
        Route::patch('/update/{id}', 'update')->name('update'); //->middleware('permission:Test Demos Read');
        Route::get('/get', 'testDemosGet')->name('get'); //->middleware('permission:Test Demos Read');
        Route::get('/show/{id}', 'show')->name('show'); //->middleware('permission:Test Demos Read');
        Route::delete('/destroys/{id}', 'destroy')->name('destroy'); //->middleware('permission:Test Demos Read');
        Route::delete('/force-destroy/{id}', 'forceDestroy')->name('force.destroy'); //->middleware('permission:Test Demos Read');
        Route::get('/restore/{id}', 'restore')->name('restore'); //->middleware('permission:Test Demos Read');
        Route::get('/pdf/{id}', 'testDemosPDF')->name('pdf'); //->middleware('permission:Test Demos Read');
        Route::get('/excel-import', 'testDemosExcelImport')->name('import'); //->middleware('permission:Test Demos Excel Import');
        Route::post('/excel-upload', 'testDemosExcelUpload')->name('upload'); //->middleware('permission:Test Demos Excel Import');
        Route::get('/excel-sample-download', 'testDemosExcelSampleDownload')->name('download'); //->middleware('permission:Test Demos Excel Import');

        // Route::get(uri: '/demo1', 'demo')->name('demo1');
        Route::get('/demo', 'demo')->name('demo');
        Route::get('/check', 'check')->name('check');
    });

    //test demo
    Route::controller('App\Http\Controllers\AppControllers\UserController')->prefix('/admin/users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index'); //->middleware('permission:Test Demos Read');
        Route::get('/create', 'create')->name('create'); //->middleware('permission:Test Demos Read');
        Route::post('/store', 'store')->name('store'); //->middleware('permission:Test Demos Read');
        Route::get('/edit/{id}', 'edit')->name('edit'); //->middleware('permission:Test Demos Read');
        Route::patch('/update/{id}', 'update')->name('update'); //->middleware('permission:Test Demos Read');
        Route::get('/get', 'testDemosGet')->name('get'); //->middleware('permission:Test Demos Read');
        Route::get('/show/{id}', 'show')->name('show'); //->middleware('permission:Test Demos Read');
        Route::delete('/destroys/{id}', 'destroy')->name('destroy'); //->middleware('permission:Test Demos Read');
        Route::delete('/force-destroy/{id}', 'forceDestroy')->name('force.destroy'); //->middleware('permission:Test Demos Read');
        Route::get('/restore/{id}', 'restore')->name('restore'); //->middleware('permission:Test Demos Read');
        Route::get('/pdf/{id}', 'testDemosPDF')->name('pdf'); //->middleware('permission:Test Demos Read');
        Route::get('/excel-import', 'testDemosExcelImport')->name('import'); //->middleware('permission:Test Demos Excel Import');
        Route::post('/excel-upload', 'testDemosExcelUpload')->name('upload'); //->middleware('permission:Test Demos Excel Import');
        Route::get('/excel-sample-download', 'testDemosExcelSampleDownload')->name('download'); //->middleware('permission:Test Demos Excel Import');

        // Route::get(uri: '/demo1', 'demo')->name('demo1');
        Route::get('/demo', 'demo')->name('demo');
        Route::get('/check', 'check')->name('check');
    });
});
