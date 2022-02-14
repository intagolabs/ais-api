<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('v1/ais', [\App\Http\Controllers\ApiController::class,'bulk']);
Route::get('v1/ais/{ais}', [\App\Http\Controllers\ApiController::class,'get']);
