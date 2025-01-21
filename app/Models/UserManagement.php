<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',       // Name of the user
        'email',      // Email address
        'password',   // Password
        'status',     // User role/status (admin, subadmin, manager, etc.)
    ];
}
