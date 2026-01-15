<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Services\VehiclePhotoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehiclePhotoController extends Controller
{
    protected $photoService;

    public function __construct(VehiclePhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required|exists:vehicles,id',
            'photos' => 'required|array|min:1',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $vehicle = $this->photoService->store(
            $request->vehicle_id,
            $request->file('photos')
        );

        if (!$vehicle) {
            return response()->json([
                'status' => false,
                'message' => 'Vehicle not found or unauthorized',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Photos uploaded successfully',
            'data' => $vehicle,
        ], 201);
    }
}
