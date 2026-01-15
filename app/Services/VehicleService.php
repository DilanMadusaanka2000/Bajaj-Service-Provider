<?php

namespace App\Services;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehicleService
{
    /**
     * Create a new vehicle record.
     *
     * @param array $data
     * @return Vehicle
     */
    public function create(array $data)
    {
        $data['user_id'] = Auth::id();

        return Vehicle::create($data);
    }

    public function getAllforAdmin()
    {
        return Vehicle::with ('location')
        ->where('user_id',Auth:id())
        ->get();
    }

    public function getOneForAmin($id){
        return Vehicle::with('location')
        ->where('id',$id)
        ->where('user_id',Auth:id())
        ->first();
    }

    public function deleteForAdmin($id){
        $vehicle = Vehicle::find($id);

        if ($vehicle && $vehicle->user_id == Auth::id()) {
            $vehicle->delete();
            return true;
        }
        return false;
    }
    public function updateForAdmin(int $id, array $data)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return null;
        }

        $vehicle->update($data);
        return $vehicle;
    }


}
