<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [

        'name',
        'address',
        'phone',
        'postal_code', // Ensure it matches the migration
        'spare_part_name', // Ensure it matches the migration
        'spareParts_id', // Ensure it matches the migration
        'quantity',
        'status',
    ];




}
