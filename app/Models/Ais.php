<?php

namespace App\Models;

use App\Http\Controllers\OpenStreetMapController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ais extends Model
{
    use HasFactory;

    protected $primaryKey = 'mmsi';

    protected $fillable = [
        'mmsi','imo','name','latitude','longitude','navstat','location','address'
    ];

    public function getLocationAttribute() {
        return OpenStreetMapController::fetchLocation($this);
    }

    public function getAddressAttribute() {
        return OpenStreetMapController::fetchAddress($this);
    }
}
