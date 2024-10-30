<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{

    public function dashboard()
    {
        return view('backend.dashboard')->with(
            []
        );
    }
}
