<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterSP extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        // Add all your database column names here
    ];
}
