<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // common resource routes
    // index - show all listings
    // show - show single listing
    // create - show form to create new listing
    // store - store new listing
    // edit - show form to edit listing
    // update - update listing
    // destroy - delete listing

    // show register form
    public function create()
    {
        return view('register');
    }

    //  store new users
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = User::create($formFields);

        // login
        auth()->login($user);

        // redirect
        return redirect('/')->with('flashMessage', 'User created and logged in');
    }

    // logout user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('flashMessage', 'You have been logged out!');
    }

    // show login form
    public function login()
    {
        return view('login');
    }

    // authenticate login form
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('flashMessage', 'You are now logged in');
        }
        return back()
            ->withErrors(['email' => 'invalid credentials'])
            ->onlyInput();
    }
}
