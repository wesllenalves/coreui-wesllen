<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerHome extends Controller
{
    //
    public function home()
    {
        
        return view('home');
    }
}
