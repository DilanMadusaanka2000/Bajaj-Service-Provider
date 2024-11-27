<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VehicleMaintain; // Import the model

class CustomerHomeController extends Controller

{

    protected $task;
    public function __construct()
    {
        $this->task = new VehicleMaintain();
    }



    public function index(){
        return view('customerView.homePage');
    }

    public function maintain(){
        return view('customerView.vehicle_Maintenance.vehicleMaintain');
    }

    public function store(Request $request){

        //dd($request);
        $this->task->create($request->all());
        //passed only single error



        //return redirect()->route()->with('success', 'Vehicle maintenance record saved successfully.');
        return redirect()->route('time')->with('success', 'Vehicle maintenance record saved successfully.');


}


public function time (){

    return view('dashboard1.maintainRequestTime');
}
}
