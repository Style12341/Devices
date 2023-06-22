<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => [
                'required',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                'confirmed', 'min:6'
            ]
        ]);
        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        //Creaate User
        $user = User::create($formFields);
        //Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have logged out');
    }
    //Show login form

    public function login(Request $request)
    {

        return view('users.login');
    }
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You logged in');
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
