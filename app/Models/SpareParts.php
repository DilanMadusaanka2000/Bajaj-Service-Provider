<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpareParts extends Model
{
    use HasFactory;
    protected $primaryKey = 'spareParts_id';



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
