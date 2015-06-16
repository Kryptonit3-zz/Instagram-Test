<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function getRegister()
    {
        return view('instagram.auth.register');
    }

    public function postRegister(Requests\RegisterAccount $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        auth()->login($user);

        session()->flash('success', 'Account created successfully! You have been logged in!');

        return redirect()->route('home');
    }

    public function getLogin()
    {
        return view('instagram.auth.login');
    }

    public function postLogin(Requests\LoginAccount $request)
    {
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            session()->flash('success', 'Successfully logged in! Welcome back!');
            return redirect()->intended(route('home'));
        };
        session()->flash('error', 'There seems to be an issue with your credentials!');
        return redirect()->back()->withInput();
    }

    public function getLogout()
    {
        auth()->logout();

        session()->flash('success', 'See ya later!');

        return redirect()->route('home');
    }
}
