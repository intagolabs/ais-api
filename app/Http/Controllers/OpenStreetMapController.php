<?php

namespace App\Http\Controllers;

use App\Models\Ais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class OpenStreetMapController extends Controller
{
    public static function fetchLocation(Ais $ais) {
        return OpenStreetMapController::reverse($ais->longitude,$ais->latitude)->address->municipality;
    }

    public static function fetchAddress(Ais $ais) {
        return OpenStreetMapController::reverse($ais->longitude,$ais->latitude)->address;
    }

    public static function reverse($longitude,$latitude) {
        return Cache::rememberForever('co'.$longitude.'-'.$latitude, function() use($longitude, $latitude) {
            sleep(1);
            return json_decode(file_get_contents("https://nominatim.openstreetmap.org/reverse?email=info@intago.be&accept-language=nl-NL,en-US&format=jsonv2&lat=".$latitude."&lon=".$longitude));
        });
    }
}
