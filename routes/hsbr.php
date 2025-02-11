<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->middleware(['auth', 'verified'])->group(function () {



    Route::redirect('/admin', destination: '/admin/dashboard');
    Route::redirect('/dashboard', destination: '/admin/dashboard');
    Route::get('/admin/dashboard', 'App\Http\Controllers\HakControllers\BackendController@dashboard')->name('backend.dashboard');
    Route::get('/admin/start', 'App\Http\Controllers\HakControllers\BackendController@starter')->name('backend.starter');
    Route::get('/dashboard-stats', 'App\Http\Controllers\HakControllers\BackendController@getDashboardStats')->name('backend.dashboard.stats');
});

Route::get('/hsbr', function () {
    return view('hsbr_frontend.welcome');
});
