<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    //Show all devices
    public function index()
    {
        return view('devices', [
            'devices' => Device::all()
        ]);
    }
    //Show single device
    public function show(Device $device)
    {
        return view('device', [
            'device' => $device
        ]);
    }
}
