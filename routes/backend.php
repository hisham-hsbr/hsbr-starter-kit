<?php

use App\Http\Controllers\HakControllers\JobQueueController;
use App\Http\Controllers\HakControllers\UserController;
use App\Models\HakModels\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('auth')->middleware(['auth', 'verified'])->group(function () {


    Route::get('/test', action: function () {
        return view(view: 'backend.emails.email'); // The 'example' view will be loaded from resources/views/example.blade.php
    });


    Route::redirect('/admin', destination: '/admin/dashboard');
    Route::redirect('/dashboard', destination: '/admin/dashboard');
    Route::get('/admin/dashboard', 'App\Http\Controllers\HakControllers\BackendController@dashboard')->name('backend.dashboard');
    Route::get('/admin/start', 'App\Http\Controllers\HakControllers\BackendController@starter')->name('backend.starter');

    Route::get('/users', ['App\Http\Controllers\HakControllers\UserController@index'])->name('users.index');
    Route::get('/users/get', ['App\Http\Controllers\HakControllers\UserController@getUsers'])->name('users.get');

    //activity-logs
    Route::controller('App\Http\Controllers\HakControllers\ActivityLogController')->prefix('/admin/user-management/activity-logs')->name('activity.logs.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:Activity Log Read');
        Route::get('/show/{id}', 'show')->name('show')->middleware('permission:Activity Log Show');
        Route::get('/get', 'activityLogsGet')->name('get')->middleware('permission:Activity Log Read');
        Route::delete('/destroys/{id}', 'destroy')->name('destroy')->middleware('permission:Activity Log Delete');
        Route::delete('/force-destroy/{id}', action: 'forceDestroy')->name('force.destroy')->middleware('permission:Activity Log Force Delete');
    });

    // test demo
    Route::controller('App\Http\Controllers\HakControllers\TestDemoController')->prefix('/admin/test/demos')->name('test.demos.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:Test Demo Read');
        Route::get('/create', 'create')->name('create')->middleware('permission:Test Demo Create');
        Route::post('/store', 'store')->name('store')->middleware('permission:Test Demo Create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('permission:Test Demo Edit');
        Route::patch('/update/{id}', 'update')->name('update')->middleware('permission:Test Demo Edit');
        Route::get('/get', 'testDemosGet')->name('get')->middleware('permission:Test Demo Read');
        Route::get('/show/{id}', 'show')->name('show')->middleware('permission:Test Demo Show');
        Route::delete('/destroys/{id}', 'destroy')->name('destroy')->middleware('permission:Test Demo Delete');
        Route::delete('/force-destroy/{id}', action: 'forceDestroy')->name('force.destroy')->middleware('permission:Test Demo Force Delete');
        Route::get('/restore/{id}', 'restore')->name('restore')->middleware('permission:Test Demo Restore');
        Route::get('/pdf/{id}', 'testDemosPDF')->name('pdf')->middleware('permission:Test Demo Export PDF');
        Route::get('/excel-import', 'testDemosExcelImport')->name('import')->middleware('permission:Test Demo Excel Import');
        Route::post('/excel-upload', 'testDemosExcelUpload')->name('upload')->middleware('permission:Test Demo Excel Import');
        Route::get('/excel-sample-download', 'testDemosExcelSampleDownload')->name('download')->middleware('permission:Test Demo Excel Import');
    });
    // role
    Route::controller('App\Http\Controllers\HakControllers\RoleController')->prefix('/admin/user-management/roles')->name('roles.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:Role Read');
        Route::get('/create', 'create')->name('create')->middleware('permission:Role Create');
        Route::post('/store', 'store')->name('store')->middleware('permission:Role Create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('permission:Role Edit');
        Route::patch('/update/{id}', 'update')->name('update')->middleware('permission:Role Edit');
        Route::get('/get', 'rolesGet')->name('get')->middleware('permission:Role Read');
        Route::get('/refresh', 'rolesRefresh')->name('refresh')->middleware('permission:Role Refresh');
        Route::get('/show/{id}', 'show')->name('show')->middleware('permission:Role Show');
        Route::delete('/destroys/{id}', 'destroy')->name('destroy')->middleware('permission:Role Delete');
        Route::delete('/force-destroy/{id}', action: 'forceDestroy')->name('force.destroy')->middleware('permission:Role Force Delete');
        Route::get('/restore/{id}', 'restore')->name('restore')->middleware('permission:Role Restore');
        Route::get('/pdf/{id}', 'rolesPDF')->name('pdf')->middleware('permission:Role Export PDF');
        Route::get('/excel-import', 'rolesExcelImport')->name('import')->middleware('permission:Role Excel Import');
        Route::post('/excel-upload', 'rolesExcelUpload')->name('upload')->middleware('permission:Role Excel Import');
        Route::get('/excel-sample-download', 'rolesExcelSampleDownload')->name('download')->middleware('permission:Role Excel Import');
    });
    // permission
    Route::controller('App\Http\Controllers\HakControllers\PermissionController')->prefix('/admin/user-management/permissions')->name('permissions.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:Permission Read');
        Route::get('/create', 'create')->name('create')->middleware('permission:Permission Create');
        Route::post('/store', 'store')->name('store')->middleware('permission:Permission Create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('permission:Permission Edit');
        Route::patch('/update/{id}', 'update')->name('update')->middleware('permission:Permission Edit');
        Route::get('/get', 'permissionsGet')->name('get')->middleware('permission:Permission Read');
        Route::get('/refresh', 'permissionsRefresh')->name('refresh')->middleware('permission:Permission Refresh');
        Route::get('/show/{id}', 'show')->name('show')->middleware('permission:Permission Show');
        Route::delete('/destroys/{id}', 'destroy')->name('destroy')->middleware('permission:Permission Delete');
        Route::delete('/force-destroy/{id}', action: 'forceDestroy')->name('force.destroy')->middleware('permission:Permission Force Delete');
        Route::get('/restore/{id}', 'restore')->name('restore')->middleware('permission:Permission Restore');
        Route::get('/pdf/{id}', 'permissionsPDF')->name('pdf')->middleware('permission:Permission Export PDF');
        Route::get('/excel-import', 'permissionsExcelImport')->name('import')->middleware('permission:Permission Excel Import');
        Route::post('/excel-upload', 'permissionsExcelUpload')->name('upload')->middleware('permission:Permission Excel Import');
        Route::get('/excel-sample-download', 'permissionsExcelSampleDownload')->name('download')->middleware('permission:Permission Excel Import');
    });

    //user
    Route::controller('App\Http\Controllers\HakControllers\UserController')->prefix('/admin/user-management/users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:User Read');
        Route::get('/create', 'create')->name('create')->middleware('permission:User Create');
        Route::post('/store', 'store')->name('store')->middleware('permission:User Create');
        Route::get('/edit/{id}', 'edit')->name('edit')->middleware('permission:User Edit');
        Route::patch('/update/{id}', 'update')->name('update')->middleware('permission:User Edit');
        Route::get('/get', 'usersGet')->name('get')->middleware('permission:User Read');
        Route::get('/show/{id}', 'show')->name('show')->middleware('permission:User Show');
        Route::delete('/destroys/{id}', 'destroy')->name('destroy')->middleware('permission:User Delete');
        Route::delete('/force-destroy/{id}', 'forceDestroy')->name('force.destroy')->middleware('permission:User Force Delete');
        Route::get('/restore/{id}', 'restore')->name('restore')->middleware('permission:User Restore');
        Route::get('/pdf/{id}', 'usersPDF')->name('pdf')->middleware('permission:User Export PDF');
        Route::get('/excel-import', 'usersExcelImport')->name('import')->middleware('permission:User Excel Import');
        Route::post('/excel-upload', 'usersExcelUpload')->name('upload')->middleware('permission:User Excel Import');
        Route::get('/excel-sample-download', 'usersExcelSampleDownload')->name('download')->middleware('permission:User Excel Import');

        Route::post('/check-email', 'checkEmail')->name('check.email')->middleware('permission:User Create');
        Route::post('/resend-email-verification/{id}', 'resendEmailVerification')->name('resend.email.verification')->middleware('permission:Resend Email Verification');
        Route::post('/password-reset/{email}', 'resendEmailVerification')->name('password.reset')->middleware('permission:Resend Email Verification');
        Route::post('/send-otp/{id}', 'sendOTP')->name('send.otp')->middleware('permission:Send OTP Email');
    });

    //User Profile

    Route::controller('App\Http\Controllers\HakControllers\UserController')->prefix('/admin/profile')->name('user.profile.')->group(function () {
        Route::get('/', 'profileEdit')->name('edit')->middleware('permission:User Profile Edit');
        Route::patch('/', 'profileUpdate')->name('update')->middleware('permission:User Profile Edit');
        Route::delete('/', 'profileDestroy')->name('destroy')->middleware('permission:User Profile Delete');
        Route::patch('/avatar-update', 'avatarUpdate')->name('avatar.update')->middleware('permission:User Profile Avatar Edit');
        Route::patch('/avatar-delete', 'avatarDelete')->name('avatar.delete')->middleware('permission:User Profile Avatar Edit');
    });

    Route::get('/jobs/pending', [JobQueueController::class, 'fetchPendingJobs']);
    Route::get('/jobs/failed', [JobQueueController::class, 'fetchFailedJobs']);
    Route::get('/job-queues', [JobQueueController::class, 'index']);




    // settings
    Route::controller('App\Http\Controllers\HakControllers\SettingsController')->prefix('/admin/user-management/settings')->name('settings.')->group(function () {
        Route::get('/index', 'index')->name('index')->middleware('permission:Settings Read');
        Route::get('/general-settings', 'generalSettings')->name('general.settings')->middleware('permission:Settings General Read');
        Route::patch('/general-settings/update', 'generalSettingsUpdate')->name('general.settings.update')->middleware('permission:Settings General Update');
        Route::get('/model-settings/{model}', 'modelSettings')->name('model.settings')->middleware('permission:Settings Model Read');
        Route::patch('/model-settings/update/{model}', 'modelSettingsUpdate')->name('model.settings.update')->middleware('permission:Settings Model Edit');
    });
});
