<?php

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;

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

Route::controller(DeviceController::class)->group(function () {
    //All devices
    Route::get('/', 'index');
    // Single Device
    Route::get('/devices/{device}', 'show');
    
    Route::get('/devices/manage', 'manage')->middleware('auth');
    //Store device data
    Route::post('/devices', 'store')->middleware('auth');
    //Show create form
    Route::get('/devices/create', 'create')->middleware('auth');
    // Show edit form
    Route::get('/devices/{device}/edit', 'edit')->middleware('auth');
    // Update Device
    Route::put('/devices/{device}', 'update')->middleware('auth');
    // Delete Device
    Route::delete('/devices/{device}', 'destroy')->middleware('auth');
    
});


Route::controller(UserController::class)->group(function () {
    //SShow register form
    Route::get('/register', 'create')->middleware('guest');
    //Create new user
    Route::post('/users', 'store');
    //Logout
    Route::post('/logout', 'logout')->middleware('auth');
    //Show login form;
    Route::get('/login', 'login')->name('login')->middleware('guest');
    //Login
    Route::post('/users/authenticate', 'authenticate');
});
//Manage Listings
