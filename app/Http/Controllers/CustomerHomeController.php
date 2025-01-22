<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleMaintain; // Import the VehicleMaintain model
use Illuminate\Support\Facades\Auth;
use App\Models\MaintainTime;
use App\Mail\VehicleMaintenanceMail;
use Illuminate\Support\Facades\Mail;


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
    try {
        // Validate the incoming request
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'vehicle_type' => 'required|string',
            'vehicle_name' => 'required|string',
            'vehicle_number' => 'required|string',
            'maintenance_services' => 'required|array', // Changed from 'string' to 'array'
            'wash_type' => 'required|string',
            'date' => 'required|date',
            'time_slot' => 'required|string',
        ]);

        // Convert the maintenance services array to a comma-separated string or JSON string
        $maintenanceServices = implode(', ', $validatedData['maintenance_services']);
       // $maintenanceServices = implode(', ', $validatedData['maintenance_services']);// or json_encode($validatedData['maintenance_services']);

        // Create the VehicleMaintain record in the database
        VehicleMaintain::create([
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'vehicle_type' => $validatedData['vehicle_type'],
            'vehicle_name' => $validatedData['vehicle_name'],
            'vehicle_number' => $validatedData['vehicle_number'],
            'maintenance_services' => $maintenanceServices, // Store as a string
            'wash_type' => $validatedData['wash_type'],
            'date' => $validatedData['date'],
            'time_slot' => $validatedData['time_slot'],
            'user_id' => Auth::id(),
        ]);



        // //$validatedData['maintenance_services'] = $maintenanceServices;
        // Mail::to($validatedData['email'])->send(new VehicleMaintenanceMail($validatedData));
        // \Log::info('Email sent successfully to: ' . $validatedData['email']);
       // $validatedData['maintenance_services'] = implode(', ', $validatedData['maintenance_services']);
       $validatedData['maintenance_services'] = $maintenanceServices;
        Mail::to($validatedData['email'])->send(new VehicleMaintenanceMail($validatedData));

        \Log::info('Email sent successfully to: ' . $validatedData['email']);




        // Success message or redirection
        return redirect()->route('maintain')->with('success', 'Vehicle maintenance request submitted successfully!');
    } catch (\Exception $e) {
        // Log the error
        \Log::error('Error saving maintenance record: ' . $e->getMessage());
        //dd($e->getMessage()); // Show the error message in case of failure

        \Log::error('Error sending email: ' . $e->getMessage());
        dd('Error: ' . $e->getMessage());
    }
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
