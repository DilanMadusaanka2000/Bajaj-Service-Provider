<?php

namespace App\Http\Controllers;
use App\Models\MaintainTime;
use App\Models\VehicleMaintain;

use Illuminate\Http\Request;

class vehicleContoller extends Controller
{
 public function index()
 {

    return view ('SpareParts.vehicle_maintain.vehicle_maintain');

 }


 public function view(Request $request){

       // Fetch all vehicle maintenance requests
       $query = VehicleMaintain::query();

        // Check if a search term is provided
        if ($request->has('search') && $request->search != '') {
            $query->where('full_name', 'like', '%' . $request->search . '%');
        }

        $VehicleMaintain = $query->get();

        return view('SpareParts.vehicle_maintain.view_maintain', compact('VehicleMaintain'));
 }


 public function todayMaintain()
{
    // Get today's date
    $today = now()->toDateString();

    // Fetch maintenance records for today
    $VehicleMaintain = VehicleMaintain::whereDate('date', $today)->get();

    return view('SpareParts.vehicle_maintain.today_maintain', compact('VehicleMaintain'));
}




 public function updateStatus(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'status' => 'required|in:pending,cancelled,completed',
    ]);

    // Find the maintenance request by ID
    $maintenanceRequest = VehicleMaintain::findOrFail($id);

    // Update the status
    $maintenanceRequest->status = $request->status;
    $maintenanceRequest->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Status updated successfully.');
}



}
