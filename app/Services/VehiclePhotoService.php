<?php

namespace App\Services;

use App\Models\Vehicle;
use App\Models\VehiclePhoto;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class VehiclePhotoService
{
    /**
     * Store photos for a vehicle (vehicle_id + photos[])
     */
    public function store(int $vehicleId, array $photos)
    {
        $vehicle = Vehicle::where('id', $vehicleId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$vehicle) {
            return null;
        }

        foreach ($photos as $photo) {
            if ($photo instanceof UploadedFile) {
                VehiclePhoto::create([
                    'vehicle_id' => $vehicleId,
                    'photo'      => file_get_contents($photo->getRealPath()),
                    'mime_type'  => $photo->getMimeType(),
                ]);
            }
        }

        return $vehicle->load('photos');
    }
}
