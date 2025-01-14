<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SparpartsDashbordController extends Controller
{
    public function index()
    {
        return view('SpareParts.Dashboard.dashboard');
    }



    
}
