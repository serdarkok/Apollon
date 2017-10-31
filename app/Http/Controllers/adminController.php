<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categories;
use App\Categories_con;
use App\Language;
use App\Menu;
use App\Menu_con;
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
        // Sadece child_id'si 0 olanları listeledik. Ana kategoriler
        $_categories = Categories::select('id','child_id')->where('child_id','=','0')->get();
        // Kategorileri loop'a soktuk, alt kategorileri child_categories'e ekledik
        foreach ($_categories as $item)
        {
            $_child_categories = Categories::where('child_id','=', $item->id)->get();
            $item->child_categories = $_child_categories;
        }

        return view('admin.categories', ['categories' => $_categories]);
    }

    public function getNewCategory()
    {
        $_categories = Categories::select('id')->where('child_id','=','0')->get();

        foreach ($_categories as $item)
        {
            $_categories = Categories_con::where('child_id', '0')->pluck('category_name', 'cat_id');
        }
        $_language = Language::pluck('language_name', 'id');
        return view('admin.newCategory', ['categories' => $_categories, 'language' => $_language]);
    }

    public function postNewCategory(Request $r)
    {
        $r->validate([
            'category_name'      => 'required|unique:categories_cons,category_name',
            'category_slug'      => 'required',
            'category_lang_id'   => 'required'
        ]);
        $_category = $r->only('child_id');
        $_categoryDB = new Categories();
        $_categoryID = $_categoryDB->create($_category)->id;
        $_category_conDB  = new Categories_con();

        // Sistemde kayıtlı kaç tane dil varsa o dile göre kategori eklemesi yapıyor.
        $_language = Language::all();
        foreach ($_language as $item) {
            $_category_conDB->cat_id = $_categoryID;
            $_category_conDB->category_name = $r->category_name;
            $_category_conDB->category_slug = str_slug($r->category_slug);
            $_category_conDB->category_lang_id =  $item->id;
            $_category_conDB->save();
        }
        return Redirect::route('categoriesMainPage');
    }

    public function getEditCategory()
    {

    }

    public function postEditCategory()
    {

    }

    public function deleteCategory($id)
    {
        // Önce ana kategoriyi ve ana kategoriye bağlı olan alt kategorileri siler
        $_category = Categories::findOrFail($id);
        $_category->delete();
        Categories_con::where('cat_id', '=', $id)->delete();
        return Redirect::route('categoriesMainPage');
    }

    // Menüler -- Menus

    public function getMenus()
    {
        // Sadece menu_child_id'si 0 olanları listeledik. Ana kategoriler
        $_menus = Menu::select('id','menu_child_id')->where('menu_child_id','=','0')->get();
        // Menüleri loop'a soktuk, alt menüleri child_menus'e ekledik
        foreach ($_menus as $item)
        {
            $_child_menus = Menu::where('menu_child_id','=', $item->id)->get();
            $item->child_menus = $_child_menus;
        }

        return view('admin.menus', ['menus' => $_menus]);
    }

    public function getNewMenu()
    {
        $_language = Language::pluck('language_name', 'id');
        $_menus = Menu::all();
        // return $_last_order;
        return view('admin.newMenu', ['menus' => $_menus, 'language' => $_language]);

    }

    public function postNewMenu(Request $r)
    {
        $_menu = $r->only('menu_child_id', 'menu_order');
        $_menuDB = new Menu();
        $_menuID = $_menuDB->create($_menu)->id;
        $_menu_conDB  = new Menu_con();

        // Sistemde kayıtlı kaç tane dil varsa o dile göre menü eklemesi yapıyor.
        $_language = Language::all();
        foreach ($_language as $item) {
            $_menu_conDB->menu_id = $_menuID;
            $_menu_conDB->menu_name = $r->menu_name;
            $_menu_conDB->menu_slug = str_slug($r->menu_slug);
            $_menu_conDB->menu_link = $r->menu_link;
            $_menu_conDB->menu_lang_id =  $item->id;
            $_menu_conDB->save();
        }
        return Redirect::route('menusMainPage');

    }

    public function getEditMenu()
    {

    }

    public function postEditMenu()
    {

    }

    public function deleteMenu()
    {

    }

    // Yazılar - Articles

    public function getArticles()
    {

    }

    public function getNewArticle()
    {
        $_categories = Categories::select('id')->where('child_id','=','0')->get();

        foreach ($_categories as $item)
        {
            $_categories = Categories_con::where('child_id', '0')->pluck('category_name', 'cat_id');
        }

        $_languages = Language::pluck('language_name', 'id');

        return view('admin.newArticle', ['categories' => $_categories, 'languages' => $_languages]);
    }

    public function postNewArticle(Request $r)
    {
        $_article = $r->only('cat_id', 'end_date', 'home_page');
        return $_article;

        $art_id = Article::create($_article)->id;


        $categoryCON = new Categories_con();
        $categoryCON->create($_article, $art_id );

    }


}
