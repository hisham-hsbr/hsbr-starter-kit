<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


// language change
Route::get('/change-locale/{locale}', function ($locale) {
    if (in_array($locale, haystack: ['en', 'ar', 'ml', 'hi'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('change-locale');

Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->back();
})->name('lang');


Route::get('/', function () {
    return view('frontend.welcome');
});


Route::get('/test', function () {
    return view('backend.test_demos.index');
});







require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
require __DIR__ . '/backend.php';
require __DIR__ . '/hsbr.php';
