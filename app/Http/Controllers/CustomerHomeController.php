<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Models\VehicleMaintain; // Import the model

// class CustomerHomeController extends Controller

// {

//     protected $task;
//     public function __construct()
//     {
//         $this->task = new VehicleMaintain();
//     }



//     public function index(){
//         return view('customerView.homePage');
//     }

//     public function maintain(){
//         return view('customerView.vehicle_Maintenance.vehicleMaintain');
//     }

//     public function store(Request $request){

//         //dd($request);
//         $this->task->create($request->all());
//         //passed only single error



//         //return redirect()->route()->with('success', 'Vehicle maintenance record saved successfully.');
//         return redirect()->route('time')->with('success', 'Vehicle maintenance record saved successfully.');


// }


// public function time (){

//     return view('dashboard1.maintainRequestTime');
// }
// }








namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleMaintain; // Import the VehicleMaintain model
use App\Models\MaintainTime; // Import the MaintainTime model

class CustomerHomeController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new VehicleMaintain();
    }

    public function index()
    {
        return view('customerView.homePage');
    }

    public function maintain()
    {
        return view('customerView.vehicle_Maintenance.vehicleMaintain');
    }

    public function store(Request $request)
    {
        // Save vehicle maintenance record
        $vehicleMaintain = $this->task->create($request->all());

        // Redirect to time selection form with the maintain ID and vehicle number
        return redirect()->route('time', ['maintain_id' => $vehicleMaintain->id, 'vehicle_number' => $vehicleMaintain->vehicle_number])
                         ->with('success', 'Vehicle maintenance record saved successfully.');
    }

    public function time(Request $request)
    {
        // Load the time selection form
        return view('dashboard1.maintainRequestTime', [
            'maintain_id' => $request->maintain_id,
            'vehicle_number' => $request->vehicle_number,
        ]);
    }

    public function saveTime(Request $request)
    {
        // Save the selected date and time
        MaintainTime::create([
            'maintain_id' => $request->maintain_id,
            'vehicle_number' => $request->vehicle_number,
            'date' => $request->date,
            'time_slot' => $request->time_slot,
        ]);

        return redirect()->route('home')->with('success', 'Time slot selected successfully.');
    }
}
