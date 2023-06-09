<?php

use App\Http\Controllers\DeviceController;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//All devices

Route::get('/', [DeviceController::class, 'index']);

// Single Device
Route::get('/devices/{device}', [DeviceController::class, 'show']);
