<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventryController extends Controller
{

    public function index()
    {
        return view("SpareParts.Dashboard.inventory");
    }
}
