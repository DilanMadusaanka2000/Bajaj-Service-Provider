<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiclePhoto extends Model
{
    protected $table = 'vehicle_photos';

    protected $fillable = [
        'vehicle_id',
        'photo',
        'mime_type',
    ];

    // Prevent binary data from being returned in API responses
    protected $hidden = [
        'photo',
    ];

    /**
     * Relationship: Photo belongs to a vehicle
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
