<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DeviceController extends Controller
{
    public function manage()
    {
        return view('devices.manage', [
            'devices' => auth()->user()->devices()->get()
        ]);
    }
    //Show all devices
    public function index()
    {
        return view('devices.index', [
            'devices' => Device::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
    //Show single device 
    public function show(Device $device)
    {
        return view('devices.show', [
            'device' => $device
        ]);
    }
    public function create()
    {
        return view('devices.create');
    }
    public function edit(Device $device)
    {
        if ($device->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        return view('devices.edit', ['device' => $device]);
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('devices', 'company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();
        Device::create($formFields);

        return redirect('/')->with('message', 'Device created succesfully!');
    }
    public function update(Request $request, Device $device)
    {
        //Ensure loggged in user is owner

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $device->update($formFields);

        return redirect('/')->with('message', 'Device updated succesfully!');
    }
    public function destroy(Device $device)
    {
        //Ensure loggged in user is owner
        if ($device->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $device->delete();
        return redirect('/')->with('message', 'Device deleted succesfully');
    }
}
