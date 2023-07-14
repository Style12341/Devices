<?php

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SystemController;
use App\Http\Middleware\UserIsOwner;

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

Route::controller(SystemController::class)->group(function () {


    Route::get('/systems/manage', 'manage')->middleware('auth');
    //Store system data
    Route::post('/systems', 'store')->middleware('auth');
    //Show create form
    Route::get('/systems/create', 'create')->middleware('auth');
    // Show edit form
    Route::get('/systems/{system}/edit', 'edit')->middleware('auth');
    // Update System
    Route::put('/systems/{system}', 'update')->middleware('auth');
    // Delete System
    Route::delete('/systems/{system}', 'destroy')->middleware('auth');
    //All systems
    Route::get('/', 'index');
    // Single System
    Route::get('/systems/{system}', 'show');
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
