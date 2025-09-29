<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table="penilaian";
    // Define the fillable properties
    protected $fillable = [
        'color',
        'score',
        'year',
        ];
}
