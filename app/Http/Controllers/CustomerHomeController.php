<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerHomeController extends Controller
{
    public function index(){

        return view('customerView.homePage');
    }


    public function maintain(){

        return view('customerView.vehicle_Maintenance.vehicleMaintain');
    }

    public function store (){

        
    }
}
