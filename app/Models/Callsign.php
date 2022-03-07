<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Callsign extends Model
{
    use HasFactory;

    protected $fillable = ['callsign','country'];
}
