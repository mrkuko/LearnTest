<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validate
        $validatedAttributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users', 'max:254'],
            'password' => ['required', Password::min(8)->numbers()->letters(), 'confirmed'],    // password_confirmation
        ]);
        // create the user
        $user = User::create($validatedAttributes);
        // log in
        Auth::login($user);
        // redirect
//        return redirect('/jobs');
        return redirect()->route('jobs.index');
    }
}
