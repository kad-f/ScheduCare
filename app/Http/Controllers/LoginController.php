<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('Pages.Auth.Login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->remember_me) {
            $remember_me = true;
        } else {
            $remember_me = false;
        }

        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            Alert::success('Success!', 'You Have Successfully Logged In!');
            return redirect()->intended('/');
        }

        Alert::error('Oops!', 'Your Credentials Do Not Match!');
        return back();
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success!', 'You Have Successfully Logged Out!');
        return redirect('/login');
    }
}
