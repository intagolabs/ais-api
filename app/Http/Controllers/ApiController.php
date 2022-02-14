<?php

namespace App\Http\Controllers;

use App\Models\Ais;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get(Ais $ais) {
        return response()->json($ais);
    }

    public function bulk(Request $request) {
        $ais = Ais::whereIn('mmsi',explode(',',$request->mmsi))->get();
        return response()->json($ais);
    }
}
