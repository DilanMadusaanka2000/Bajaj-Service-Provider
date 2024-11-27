<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintainTime extends Model
{
    use HasFactory;

    protected $fillable = ['maintain_id', 'vehicle_number', 'date', 'time_slot'];

    public function vehicleMaintain()
    {
        return $this->belongsTo(VehicleMaintain::class, 'maintain_id');
    }
}
