<?php

namespace App\Http\Controllers;

use App\Article;
use App\Articles_con;
use App\Categories;
use App\Categories_con;
use App\Guestbook;
use App\Language;
use App\Menu;
use App\Menu_con;
use App\Setting;
use App\Slider;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
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
        if (count($_categories) > 0) {
            $_2 = [];
            foreach ($_categories as $item) {
                $_1[] = Categories_con::where('cat_id', $item->id)->pluck('category_name', 'id');
            }
            foreach ($_1 as $item) {
                foreach ($item as $key => $value) {
                    $_2 += [$key => $value];
                }
            }
        }
        else
        {
            $_2 = [];
        }
        $_language = Language::pluck('language_name', 'id');
        return view('admin.newCategory', ['categories' => $_2, 'language' => $_language]);
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
        $_menus = Menu::select('id','menu_child_id', 'status')->where('menu_child_id','=','0')->get();
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

        if (count($_menus) > 0)
        {
            $_2 = [];
            foreach ($_menus as $item)
            {
                $_1[] = Menu_con::where('menu_id', $item->id)->pluck('menu_name','id');
            }

            foreach ($_1 as $item) {
                foreach ($item as $key => $value) {
                    $_2 += [$key => $value];
                }
            }
        }
        else
        {
            $_2 = [];
        }

        // return $_last_order;
        return view('admin.newMenu', ['menus' => $_2, 'language' => $_language]);

    }

    public function postNewMenu(Request $r)
    {
        $_menu = $r->only('menu_child_id', 'menu_order', 'status');
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

    public function getEditMenu($id)
    {
        $_language = Language::pluck('language_name', 'id');
        $_menus = Menu::all();

        if (count($_menus) > 0)
        {
            $_2 = [];
            foreach ($_menus as $item)
            {
                $_1[] = Menu_con::where('menu_id', $item->id)->pluck('menu_name','id');
            }

            foreach ($_1 as $item) {
                foreach ($item as $key => $value) {
                    $_2 += [$key => $value];
                }
            }
        }
        else
        {
            $_2 = [];
        }

        $_ = Menu::findOrFail($id);
        $__ = Menu_con::where('menu_id', $_->id)->first();
        $_['menu_name'] = $__->menu_name;
        $_['menu_slug'] = $__->menu_slug;
        $_['menu_link'] = $__->menu_link;
        $_['menu_link'] = $__->menu_link;
        $_['menu_lang_id'] = $__->menu_lang_id;
        return view('admin.newMenu', ['menu' => $_, 'menus' => $_2, 'language' => $_language]);
    }

    public function postEditMenu(Request $r, $id)
    {
        $_menu = $r->only('menu_child_id', 'menu_order', 'status');
        Menu::findOrFail($id)->update($_menu);

        $_menu_conDB  = Menu_con::where('menu_id', $id)->first();

        // Sistemde kayıtlı kaç tane dil varsa o dile göre menü eklemesi yapıyor.
        $_language = Language::all();
        foreach ($_language as $item) {
            $_menu_conDB->menu_id = $id;
            $_menu_conDB->menu_name = $r->menu_name;
            $_menu_conDB->menu_slug = str_slug($r->menu_slug);
            $_menu_conDB->menu_link = $r->menu_link;
            $_menu_conDB->menu_lang_id =  $item->id;
            $_menu_conDB->save();
        }
        return Redirect::route('menusMainPage');

    }

    public function deleteMenu()
    {

    }

    // Yazılar - Articles

    public function getArticles()
    {
        $_ = Article::all();
        return view('admin.articles', ['articles' => $_]);
    }

    public function getNewArticle()
    {

         $_categories = Categories::select('id')->get();

         // Eğer herhangi bir kategori yoksa, 0 Kategorisiz array'i oluşturur.
         if (count($_categories) > 0)
         {
             $_2 = [];
             foreach ($_categories as $item)
             {
                 $_1[] = Categories_con::where('cat_id', $item->id)->pluck('category_name','id');
             }

             foreach ($_1 as $item) {
                 foreach ($item as $key => $value) {
                     $_2 += [$key => $value];
                 }
             }
         }
         else
         {
             $_2 = ['0' => 'Kategorisiz'];
         }

        $_languages = Language::pluck('language_name', 'id');
        return view('admin.newArticle', ['categories' => $_2, 'languages' => $_languages]);
    }

    // Slider Order Bulma
    public function SliderOrder()
    {
        $_slider = Slider::select('slider_order')->orderBy('slider_order', 'DESC')->first();
        if ($_slider) {
            return $_slider->slider_order + 1;
        }
        else {
            return '1';
        }
    }

    public function postNewArticle(Request $r) {

        $_article_short = $r->only('cat_id', 'end_date', 'slider', 'home_page', 'status');
        $art_id = Article::create($_article_short)->id;
        if ($r->hasFile('art_image'))
        {
            $dosya = $r->file('art_image');
            $file_name = $art_id . "_" . rand(11111,9999999) . "." . mb_strtolower($dosya->getClientOriginalExtension());
            $dosya = Image::make($r->file('art_image'));
            // Buradaki 400 px ebatlarında genişliktir. Genişlik 400'den küçükse bu işlen yapılmaz. Yükseklikte genişliğe oranla küçülür.
            $dosya->widen(400, function ($constraint) {
                $constraint->upsize();
            })->save('uploads/images/'.$file_name, 80);
            // Memory'den silinir.
            $dosya->destroy();
        }
        $r->request->add(['art_id' => $art_id]);
        // art_image file_name ismini alıyor.
        $_data = $r->all();
        $_data['art_image'] = $file_name;
        Articles_con::create($_data);

        // Yazı slayt olacaksa aşağıdaki işlem yapılır.
        if($r->slider) {
            $r->request->add(['slider_order' => $this->SliderOrder()]);
            $_slider = $r->only('slider_start_date', 'slider_end_date', 'slider_order', 'art_id', 'slider_link');
            Slider::create($_slider);
        }
        // return Redirect::route('articlesMainPage');
    }

    public function deleteArticle($id) {
        $_ = Article::findOrFail($id);
        $_->delete();
        $_art_image = Articles_con::select('art_image')->where('art_id','=', $id)->first();
        // İlgili yazıya ait resmi de siler.
        //
        Articles_con::where('art_id','=', $id)->delete();
        // Article'a ait kayıtlı resim varsa onu da siler
        File::delete('uploads/images/'.$_art_image->art_image);
        // O yazıya ait slayt varsa onu da siler.
        Slider::where('art_id','=', $id)->delete();
        return Redirect::route('articlesMainPage');
    }


    // SLIDES
    public function Slider_sort()
    {
        $_sort = Slider::orderBy('slider_order', 'ASC')->get();
        return $_sort;
        $i = 0;
        foreach ($_sort as $item) {
            $i++;
            $item->slider_order = $i;
            $item->save();
        }
    }
    public function getSlides()
    {
        $this->Slider_sort();
        $_ = Slider::orderBy('slider_order', 'ASC')->get();
        return view('admin.slides', ['slides' => $_, 'total' => ($this->SliderOrder() - 1)]);
    }

    public function SliderUp($id)
    {
        $_up = Slider::where('id','=',$id)->get();
        foreach ($_up as $item) {
            $order = $item->slider_order - 1;
            $old = Slider::where('slider_order', '=', $order)->get();
            foreach ($old as $subitem) {
                $subitem->slider_order = $order + 1;
                $subitem->save();
            }
        }
        foreach ($_up as $item) {
            $item->slider_order = $item->slider_order - 1;
            $item->save();
        }
        return Redirect::back();
    }

    public function SliderDown($id)
    {
        $_up = Slider::where('id','=',$id)->get();
        foreach ($_up as $item) {
            $order = $item->slider_order + 1;
            $old = Slider::where('slider_order', '=', $order)->get();
            foreach ($old as $subitem) {
                $subitem->slider_order = $order - 1;
                $subitem->save();
            }
        }
        foreach ($_up as $item) {
            $item->slider_order = $item->slider_order + 1;
            $item->save();
        }
        return Redirect::back();
    }

    public function SlideRemove($id)
    {
        Article::findOrFail($id)->update(['slider' => '0']);
        Slider::where('art_id', $id)->delete();
        return Redirect::back();
    }

    public function getGuestBooks()
    {
        $_ = Guestbook::where('guest_reply', 0)->get();
        return view('admin.guestbooks', ['guestbooks' => $_]);
    }

    public function getEditGuestBooks($id)
    {
        $_ = Guestbook::findOrFail($id);
        $_2 = Guestbook::select('guest_text')->where('guest_reply', $id)->first();
        if ($_2) {
            $_->guest_answer = $_2->guest_text;
        }

        return view('admin.newGuestBook', ['guestbooks' => $_]);
    }

    public function postEditGuestBooks(Request $r, $id)
    {
        $_ = $r->only('guest_fullname' ,'guest_email' ,'guest_text', 'guest_phone');

        Guestbook::findOrFail($id)->update($_);

        if ($r->guest_answer)
        {
            $_2 = Guestbook::select('id')->where('guest_reply', $id)->first();
            if ($_2) {
                $_ = Guestbook::findOrFail($_2->id);
                $_->guest_text = $r->guest_answer;
                $_->guest_reply = $id;
                $_->status = '1';
                $_->save();
            }
            else {
                $_ = new Guestbook();
                $_->guest_text = $r->guest_answer;
                $_->guest_reply = $id;
                $_->status = '1';
                $_->save();
            }
        }
        else
        {
            Guestbook::where('guest_reply', $id)->delete();
        }

        return Redirect::route('guestbookMainPage');
    }
}