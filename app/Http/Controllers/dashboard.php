<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboard extends Controller
{
    //
    public function index()
    {
        # code...
        return view('pages.dashboard');
    }
}
