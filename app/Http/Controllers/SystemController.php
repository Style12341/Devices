<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SystemController extends Controller
{
    public function manage()
    {
        return view('Systems.manage', [
            'Systems' => auth()->user()->Systems()->get()
        ]);
    }
    //Show all systems
    public function index()
    {
        return view('systems.index', [
            'systems' => System::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
    //Show single system 
    public function show(System $system)
    {
        return view('systems.show', [
            'system' => $system
        ]);
    }
    public function create()
    {
        return view('systems.create');
    }
    public function edit(System $system)
    {
        if ($system->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        return view('systems.edit', ['system' => $system]);
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'company' => ['required', Rule::unique('systems', 'company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();
        System::create($formFields);

        return redirect('/')->with('message', 'System created succesfully!');
    }
    public function update(Request $request, System $system)
    {
        //Ensure loggged in user is owner

        $formFields = $request->validate([
            'name' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $system->update($formFields);

        return redirect('/')->with('message', 'System updated succesfully!');
    }
    public function destroy(System $system)
    {
        //Ensure loggged in user is owner
        if ($system->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $system->delete();
        return redirect('/')->with('message', 'System deleted succesfully');
    }
}
