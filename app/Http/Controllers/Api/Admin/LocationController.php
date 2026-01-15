<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        if ($validator->fails()){
            return response ()->json([
                'status'=>false,
                'errors'=> $validator->errors()
            ],422);
        }

        $location = Location::create([
        'name' => $request->name,
        'city' => $request->city,
        'latitude'=>$request->latitude,
        'longitude'=>$request->longitude,
        'user_id' => Auth::id()
        ]);

            return response()->json([
            'status' => true,
            'message' => 'Location created successfully',
            'data' => $location
        ], 201);


    }
    public function index(){
        $locations = Location::where('user_id', Auth::id())->get();

        return response()->json([
            'status' => true,
            'data' => $locations
        ]);
    }
}
