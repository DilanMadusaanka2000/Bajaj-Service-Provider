<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleMaintain; // Import the VehicleMaintain model
use Illuminate\Support\Facades\Auth;
use App\Models\MaintainTime;
use App\Mail\VehicleMaintenanceMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


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

    //logout unction

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function maintain()
    {
        return view('customerView.vehicle_Maintenance.vehicleMaintain');
    }

    public function store(Request $request)
    {

            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:15',
                'vehicle_type' => 'required|string',
                'vehicle_name' => 'required|string',
                'vehicle_number' => 'required|string',
                'maintenance_services' => 'required|array',
                'wash_type' => 'required|string',
                'date' => 'required|date',
                'time_slot' => 'required|string',
            ]);

            $maintenanceServices = implode(', ', $validatedData['maintenance_services']);

            $vehicleMaintain = VehicleMaintain::create([
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'vehicle_type' => $validatedData['vehicle_type'],
                'vehicle_name' => $validatedData['vehicle_name'],
                'vehicle_number' => $validatedData['vehicle_number'],
                'maintenance_services' => $maintenanceServices,
                'wash_type' => $validatedData['wash_type'],
                'date' => $validatedData['date'],
                'time_slot' => $validatedData['time_slot'],
                'user_id' => auth()->id(),
            ]);

            // Send the email
            Mail::to($validatedData['email'])->send(new VehicleMaintenanceMail($validatedData));
           // dd($validatedData);

            Log::info('Email sent successfully to: ' . $validatedData['email']);

            return redirect()->route('maintain')->with('success', 'Vehicle maintenance request submitted successfully!');


            // Log::error('Error saving maintenance record: ' . $e->getMessage());
            // Log::error('Error sending email: ' . $e->getMessage());
           // return redirect()->route('maintain')->with('error', 'Something went wrong! Try again.');

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
