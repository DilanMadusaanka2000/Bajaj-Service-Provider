<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'user_id',
        'location_id',
        'name',
        'type',
        'registration_no',
        'seats',
        'price_per_day',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function photos()
    {
        return $this->hasMany(VehiclePhoto::class);
    }
}
