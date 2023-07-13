<?php

use App\Http\Controllers\DeviceController;
use App\Models\User;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function (Request $request) {
    Route::post('/devices/properties', [DeviceController::class, 'storeProperties']);
});

Route::get('/devices', function () {
    return Device::all();
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
