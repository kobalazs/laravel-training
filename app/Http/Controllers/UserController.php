<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\User;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User($validatedData);
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect('user/login');
    }

    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $errors = new MessageBag();
            $errors->add('error', 'Login failed.');
            return redirect('user/login')->withErrors($errors);
        }
        return redirect('');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('user/login');
    }
}
