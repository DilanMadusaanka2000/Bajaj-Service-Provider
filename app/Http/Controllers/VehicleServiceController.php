<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleServiceController extends Controller
{
    public function index(){

       return view('customerView.vehicle_Maintenance.main_page.mainPage');
    }
}
