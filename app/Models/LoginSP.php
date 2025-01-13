<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSP extends Model
{
    use HasFactory;


    protected $fillable = [
        'email',  // Replace with your actual column names
        'password',  // Replace with your actual column names
        // Add other login-related columns if necessary
    ];
}
