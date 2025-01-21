<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpareParts extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'spareParts_id';
    public $incrementing = false; // If it's not an auto-incrementing field
    protected $keyType = 'string'; // If the ID is a string



    protected $fillable = [
        'name',
        'category',
        'price',
        'discount',
        'stock',
        'description',
        'image',
    ];



    public function comments()
    {
        return $this->hasMany(Comment::class, 'spareParts_id');
    }


}
