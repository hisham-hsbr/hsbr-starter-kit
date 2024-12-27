<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{

    public function dashboard()
    {
        if (Auth::user()->otp == 1) {
            session()->flash('alert_password_change', true);
        }
        return view('backend.dashboard')->with(
            []
        );
    }
    public function starter()
    {
        return view('backend.start')->with(
            []
        );
    }
}
