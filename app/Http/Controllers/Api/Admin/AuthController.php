<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $admin->assignRole('admin');

        $token = $admin->createToken('admin-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Admin registered successfully',
            'token' => $token,
            'data' => [
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'roles' => $admin->getRoleNames()
            ]
        ], 201);
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'status' => true,
            'message' => 'Profile fetched successfully',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->getRoleNames(),
                'created_at' => $user->created_at,
            ]
        ], 200);
    }
}
