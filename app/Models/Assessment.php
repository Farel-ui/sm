<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    // Define the fillable properties
    protected $fillable = [
        'color',
        'score',
        'year',
    ];
}
