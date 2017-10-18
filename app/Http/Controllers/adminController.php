<?php

namespace App\Http\Controllers;

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

        $_user = $request->except(['_token']);

        return $_user;

    }

}
