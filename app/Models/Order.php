<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'name', 'address', 'phone', 'postal_code', 'spare_part_name', 'spareParts_id', 'quantity', 'status',
    ];

}

