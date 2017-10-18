<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Redirect;

class loginController extends Controller
{
    public function getLogin() {

        return view('login/login');

    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::to('/admin');
    }

    public function checkLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect()->intended('admin');
        }

        return Redirect::to('/login')->withInput();
    }
}
