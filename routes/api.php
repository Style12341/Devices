<?php

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

Route::get('/devices', function () {
    return Device::all();
});
Route::post('/devices', function () {
    return Device::create([
        'name' => "Heated Chamber",
        'user_id' => User::first()->id,
        'tags' => 'temperature',
        'logo' => 'null',
        'company' => 'Bernard Ingeneieria',
        'location' => 'Santa Fe',
        'email' => 'bmaximiliano0210@gmmail.com',
        'description' => 'Camara de temperatura controlada de 10ºC a 60ºC'
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
