<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'homepage', 'uses' => 'layoutController@getHomePage']);

/* Route::get('/', function () {
    return view('homepage');
});
*/

Route::get('/deneme', function () {
    return view('subpage');
});

Route::get('/logout', ['as' => 'logout', 'uses' => 'loginController@getLogout']);
Route::get('/login',['as' => 'login', 'uses' => 'loginController@getLogin']);
Route::post('/login', ['as' => 'postLogin', 'uses' => 'loginController@checkLogin']);

// Admin Route Group
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/', ['as' => 'adminMainPage', 'uses' => 'adminController@getAdmin']);

    // Users Route Group
    Route::group(['prefix' => 'users'], function(){

        Route::get('/', ['as' => 'usersMainPage', 'uses' => 'adminController@getUsers']);
        Route::get('/new', ['as' => 'getNewUser', 'uses' => 'adminController@getNewUser']);
        Route::post('/new', ['as' => 'postNewUser', 'uses' => 'adminController@postNewUser']);
        Route::get('/new/{id}', ['as' => 'getEditUser', 'uses' => 'adminController@getEditUser']);
        Route::post('/new/{id}', ['as' => 'postEditUser', 'uses' => 'adminController@postEditUser']);
        Route::get('/delete/{id}', ['as' => 'userDelete', 'uses' => 'adminController@deleteUser']);

    });

    Route::group(['prefix' => 'settings'], function(){

        Route::get('/', ['as' => 'settingsMainPage', 'uses' => 'adminController@getSettings']);
        Route::get('/edit/{id}', ['as' => 'getEditSettings', 'uses' => 'adminController@getEditSettings']);
        Route::post('/edit/{id}', ['as' => 'postEditSettings', 'uses' => 'adminController@postEditSettings']);

    });

    Route::group(['prefix' => 'categories'], function (){
        Route::get('/', ['as' => 'categoriesMainPage', 'uses' => 'adminController@getCategories']);
        Route::get('/new', ['as' => 'getNewCategory', 'uses' => 'adminController@getNewCategory']);
        Route::post('/new', ['as' => 'postNewCategory', 'uses' => 'adminController@postNewCategory']);
        Route::get('/new/{id}', ['as' => 'getEditCategory', 'uses' => 'adminController@getEditCategory']);
        Route::post('/new/{id}', ['as' => 'postEditCategory', 'uses' => 'adminController@postEditCategory']);
        Route::get('/delete/{id}', ['as' => 'categoryDelete', 'uses' => 'adminController@deleteCategory']);
    });

    Route::group(['prefix' => 'menus'], function (){
        Route::get('/', ['as' => 'menusMainPage', 'uses' => 'adminController@getMenus']);
        Route::get('/new', ['as' => 'getNewMenu', 'uses' => 'adminController@getNewMenu']);
        Route::post('/new', ['as' => 'postNewMenu', 'uses' => 'adminController@postNewMenu']);
        Route::get('/new/{id}', ['as' => 'getEditMenu', 'uses' => 'adminController@getEditMenu']);
        Route::post('/new/{id}', ['as' => 'postEditMenu', 'uses' => 'adminController@postEditMenu']);
        Route::get('/delete/{id}', ['as' => 'menuDelete', 'uses' => 'adminController@deleteMenu']);
    });

    Route::group(['prefix' => 'articles'], function (){
        Route::get('/', ['as' => 'articlesMainPage', 'uses' => 'adminController@getArticles']);
        Route::get('/new', ['as' => 'getNewArticle', 'uses' => 'adminController@getNewArticle']);
        Route::post('/new', ['as' => 'postNewArticle', 'uses' => 'adminController@postNewArticle']);
        Route::get('/new/{id}', ['as' => 'getEditArticle', 'uses' => 'adminController@getEditArticle']);
        Route::post('/new/{id}', ['as' => 'postEditArticle', 'uses' => 'adminController@postEditArticle']);
        Route::get('/delete/{id}', ['as' => 'articleDelete', 'uses' => 'adminController@deleteArticle']);
    });

    Route::group(['prefix' => 'slides'], function (){
        Route::get('/', ['as' => 'slidesMainPage', 'uses' => 'adminController@getSlides']);
        Route::get('/up/{id}', ['as' => 'sliderUp', 'uses' => 'adminController@SliderUp']);
        Route::get('/remove/{id}', ['as' => 'sliderRemove', 'uses' => 'adminController@SlideRemove']);
        Route::get('/down/{id}', ['as' => 'sliderDown', 'uses' => 'adminController@SliderDown']);

    });

    Route::group(['prefix' => 'guestbooks'], function (){
       Route::get('/', ['as' => 'guestbookMainPage', 'uses' => 'adminController@getGuestBooks']);
       Route::get('/new/{id}', ['as' => 'getEditGuestBooks', 'uses' => 'adminController@getEditGuestBooks']);
       Route::post('/new/{id}', ['as' => 'postEditGuestBooks', 'uses' => 'adminController@postEditGuestBooks']);
    });

});

