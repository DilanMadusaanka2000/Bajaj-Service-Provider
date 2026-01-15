<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\LocationController;
use App\Http\Controllers\Api\Admin\VehicleController;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Auth\OtpController;
use App\Http\Controllers\Api\Admin\VehiclePhotoController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::post('/locations', [LocationController::class, 'store']);
    Route::get('/locations', [LocationController::class, 'index']);
});

Route::post('/admin/register', [AuthController::class, 'register']);

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::post('/vehicles', [VehicleController::class, 'store']);
    Route::get('/vehicles', [VehicleController::class, 'index']);
     Route::get('/vehicles/{id}', [VehicleController::class, 'show']);
});

//vehicle photo
Route::middleware(['auth:sanctum', 'abilities:admin-api'])
    ->prefix('admin')
    ->group(function () {
        Route::post('/vehicle-photos', [VehiclePhotoController::class, 'store']);
    });

    

Route::middleware(['auth:sanctum', 'abilities:admin-api'])->group(function () {
    Route::delete('/admin/vehicles/{id}', [VehicleController::class, 'destroy']);
    Route::put('/admin/vehicles/{id}', [VehicleController::class, 'update']);
});


//otp

Route::post('/auth/send-otp', [OtpController::class, 'sendOtp']);
Route::post('/auth/verify-otp', [OtpController::class, 'verifyOtpAndLogin']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [OtpController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/profile', [AuthController::class, 'profile']);
});
