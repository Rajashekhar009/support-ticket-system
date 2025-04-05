<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }

    public function store(){

        $validated = request()->validate([
            "txtName"=>'required|min:3|max:50',
            'txtEmail'=> 'required|email|unique:users,email',
            'password'=> 'required|confirmed|min:6|max:10'
        ]);

        User::create([
            'name'=> $validated['txtName'],
            'email'=> $validated['txtEmail'],
            'password'=> Hash::make($validated['password'])
        ]);
        return redirect()->route('dashboard')->with('success','User has been registered successfully!');
    }

    public function login(){
        return view("auth.login");
    }

    public function authenticate(){

        $validated = request()->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if(auth()->attempt($validated)){

            request()->session()->regenerate(); //to clear the existing sessions (if any)

            return redirect()->route('dashboard')->with('success','You have logged in successfully!');
        }

        return redirect()->route('login')->withErrors(
            ['credentials'=>"Invalid Login credentials!"]);

    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login')->with('success','You have logged out successfully!');
    }
}
