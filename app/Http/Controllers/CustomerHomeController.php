<?php

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
        return redirect()->route('time', [
            'maintain_id' => $vehicleMaintain->id,
            'vehicle_number' => $vehicleMaintain->vehicle_number
        ])->with('success', 'Vehicle maintenance record saved successfully.');
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


    //update

    public function updateStatus(Request $request, $id)
    {
        $task = VehicleMaintain::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->status = $request->status;
        $task->save();

        return response()->json([
            'message' => 'Status updated successfully',
            'status' => $task->status
        ]);
    }


    //search

    public function searchTasks(Request $request)
    {
        $query = $request->input('query');

        $tasks = VehicleMaintain::where('id', 'LIKE', "%{$query}%")
            ->orWhere('full_name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('phone', 'LIKE', "%{$query}%")
            ->orWhere('vehicle_type', 'LIKE', "%{$query}%")
            ->orWhere('vehicle_name', 'LIKE', "%{$query}%")
            ->orWhere('vehicle_number', 'LIKE', "%{$query}%")
            ->orWhere('maintenance_services', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($tasks);
    }
}
