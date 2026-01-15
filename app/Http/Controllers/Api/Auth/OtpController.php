<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $otp = rand(100000, 999999);

        Cache::put(
            'otp:login:' . $request->contact,
            $otp,
            now()->addMinutes(5)
        );

        return response()->json([
            'status' => true,
            'message' => 'OTP sent successfully',
            'otp' => $otp
        ]);
    }


    public function verifyOtpAndLogin(Request $request)
    {
        $request->validate([
            'contact' => 'required',
            'otp' => 'required|digits:6',
        ]);

        $key = 'otp:login:' . $request->contact;
        $storedOtp = Cache::get($key);

        if (!$storedOtp || $storedOtp != $request->otp) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid or expired OTP'
            ], 401);
        }

        Cache::forget($key);

        // Find user by email or phone
        $user = User::where('email', $request->contact)
                    ->first();


        // Generate Sanctum Token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ]);
    }
    

}
