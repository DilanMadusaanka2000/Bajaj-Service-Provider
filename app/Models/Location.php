<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
    'id',
    'name',
    'city',
    'latitude',
    'longitude',
    'is_active',
    'user_id' // add this
];

// Relationship (optional, helpful)
public function user()
{
    return $this->belongsTo(User::class);
}



}
