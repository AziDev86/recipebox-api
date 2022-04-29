<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // crud fields
    protected $fillable = [
        'name',
        'ingredients',
        'directions'
    ];

}
