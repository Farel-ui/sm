<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masterplan extends Model
{
    protected $fillable = ['title', 'period', 'type', 'file'];
}
