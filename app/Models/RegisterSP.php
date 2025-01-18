<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterSP extends Model
{
    use HasFactory;

    protected $table = 'register_s_p_s';

    // Specify which fields are mass assignable


    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        // Add all your database column names here
    ];
}
