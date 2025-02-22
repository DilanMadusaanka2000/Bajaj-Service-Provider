<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintainTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_number',
        'date',
        'time_slot',
    ];
}
