<?php

namespace App\Http\Controllers;

use App\User;
use Symfony\Component\HttpFoundation\Request;

class adminController extends Controller
{
    public function getAdmin()
    {
        return view('admin.index');
    }


    // Users

    public function getUsers() {

        return view('admin.users');

    }

    public function getNewUser() {

        return view('admin.newUser');

    }

    public function postNewUser(Request $request) {

        // $_user = $request->except(['_token']);
        $_user = $request->all();

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required',
            'email' => 'unique:users|required'
        ]);

        $_userDB = new User();

/*
        $_userDB->name = $request->name;
        $_userDB->surname = $request->surname;
        $_userDB->password = $request->password;
        $_userDB->email = $request->email;
        $_userDB->phone = $request->phone;
        $_userDB->authority = $request->authority;
        $_userDB->save();
*/

        $_userDB->create($_user);

        return $_user;

    }

}
