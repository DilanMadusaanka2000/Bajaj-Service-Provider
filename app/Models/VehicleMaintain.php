<?php

// app/Models/VehicleMaintain.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMaintain extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'email', 'phone', 'vehicle_type', 'vehicle_name', 'vehicle_number', 'maintenance_services', 'wash_type' , 'status'
    ];
}


