<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index (){

        return view('SpareParts.vehicle_maintain.income');
    }
}
