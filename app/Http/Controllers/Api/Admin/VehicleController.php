<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Services\VehicleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    protected $vehicleService;

    // Dependency Injection
    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:50',
            'registration_no' => 'required|string|unique:vehicles',
            'seats' => 'required|integer|min:1',
            'price_per_day' => 'required|numeric|min:0',
            'location_id' => 'required|exists:locations,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $vehicle = $this->vehicleService->create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Vehicle added successfully',
            'data' => $vehicle
        ], 201);
    }

    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => $this->vehicleService->getAllForAdmin()
        ]);
    }

    public function show($id)
    {
        $vehicle = $this->vehicleService->getOneForAdmin($id);

        if (!$vehicle) {
            return response()->json([
                'status' => false,
                'message' => 'Vehicle not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $vehicle
        ]);
    }
    public function destroy($id)
    {
        $deleted = $this -> vehicleService ->deleteForAdmin($id);

        if(!$deleted){
            return response()->json([
                'status'=>false,
                'message' => 'vehicle not found'
            ],404);
        }

        return response()->json([
            'status'=> true,
            'message' => 'vehicle deleted successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:100',
            'type' => 'sometimes|required|string|max:50',
            'registration_no' => 'sometimes|required|string|unique:vehicles,registration_no,' . $id,
            'seats' => 'sometimes|required|integer|min:1',
            'price_per_day' => 'sometimes|required|numeric|min:0',
            'location_id' => 'sometimes|required|exists:locations,id',
            'is_active' => 'sometimes|required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $vehicle = $this->vehicleService->updateForAdmin($id, $validator->validated());

        if (!$vehicle) {
            return response()->json([
                'status' => false,
                'message' => 'Vehicle not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Vehicle updated successfully',
            'data' => $vehicle
        ]);
    }

}
