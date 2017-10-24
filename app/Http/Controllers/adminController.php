<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Categories_con;
use App\Language;
use App\Setting;
use App\User;
use Illuminate\Validation\Rule;
use Redirect;
use Symfony\Component\HttpFoundation\Request;

class adminController extends Controller
{
    public function getAdmin()
    {
        return view('admin.index');
    }


    // Users

    public function getUsers() {

        $_user = User::all();

        return view('admin.users', ['users' => $_user]);

    }

    public function getNewUser() {

        return view('admin.newUser');

    }

    public function getEditUser($id) {

        $_user = User::findOrFail($id);

        return view('admin.newUser', ['user' => $_user]);

    }

    public function postNewUser(Request $request) {

        // $_user = $request->except(['_token']);
        $_user = $request->all();

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required',
            'email' => 'unique:users|required',
            'authority' => 'required'
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

        // return $_user;

        return Redirect::route('usersMainPage');

    }

    public function postEditUser(Request $request, $id)
    {

        // Eğer şifre alanına herhangi birşey girilmemişse, şifrede update yapmayacak
        if ($request->password)
        {
            $_user = $request->all();
        }
        else
        {
            $_user = $request->except(['password']);
        }

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($id)],
            'authority' => 'required'
        ]);

        $_userDB = User::findOrFail($id);

        $_userDB->update($_user);

        return Redirect::route('usersMainPage');

    }

    public function deleteUser($id)
    {

        $_user = User::findOrFail($id);

        $_user->delete();

        return Redirect::route('usersMainPage');

    }


    // Settings "Site Ayarları"

    public function getSettings() {

         $_setting = Setting::all();

        return view('admin.settings', ['setting' => $_setting]);

    }

    public function getEditSettings($id)
    {
        $_setting = Setting::findOrFail($id);

        return view('admin.newSettings', ['setting' => $_setting]);
    }

    public function postEditSettings(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'language' => 'required'
        ]);

        $_settings = $request->except(['_token']);

        $_settingsDB = Setting::findOrFail($id);

        $_settingsDB->update($_settings);

        return Redirect::route('settingsMainPage');

    }

    // Categories "Kategoriler"

    public function getCategories()
    {

        $_categories = Categories::all();

        return view('admin.categories', ['categories' => $_categories]);

    }

    public function getNewCategory()
    {

        $_categories = Categories_con::pluck('category_name', 'id');

        $_language = Language::pluck('language_name', 'id');

        return view('admin.newCategory', ['categories' => $_categories, 'language' => $_language]);

    }

    public function postNewCategory(Request $r)
    {

        $deneme = $r->all();

        $_category = $r->only('child_id');

        $_categoryDB = new Categories();

        $_categoryID = $_categoryDB->create($_category)->id;

        $_category_conDB  = new Categories_con();

        $_category_conDB->create();


        $r->validate([
           'category_name'      => 'required',
           'category_slug'      => 'required',
           'category_lang_id'   => 'required'
        ]);



    }

    public function getEditCategory()
    {

    }

    public function postEditCategory()
    {

    }

    public function deleteCategory()
    {

    }

}
