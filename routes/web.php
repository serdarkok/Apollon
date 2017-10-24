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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', ['as' => 'logout', 'uses' => 'loginController@getLogout']);

Route::get('/login',['as' => 'login', 'uses' => 'loginController@getLogin']);

Route::post('/login', ['as' => 'postLogin', 'uses' => 'loginController@checkLogin']);

// Admin Route Group
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/', ['as' => 'adminMainPage', 'uses' => 'AdminController@getAdmin']);

    // Users Route Group
    Route::group(['prefix' => 'users'], function(){

        Route::get('/', ['as' => 'usersMainPage', 'uses' => 'AdminController@getUsers']);

        Route::get('/new', ['as' => 'getNewUser', 'uses' => 'AdminController@getNewUser']);

        Route::post('/new', ['as' => 'postNewUser', 'uses' => 'AdminController@postNewUser']);

        Route::get('/new/{id}', ['as' => 'getEditUser', 'uses' => 'AdminController@getEditUser']);

        Route::post('/new/{id}', ['as' => 'postEditUser', 'uses' => 'AdminController@postEditUser']);

        Route::get('/delete/{id}', ['as' => 'userDelete', 'uses' => 'AdminController@deleteUser']);

    });

    Route::group(['prefix' => 'settings'], function(){

        Route::get('/', ['as' => 'settingsMainPage', 'uses' => 'AdminController@getSettings']);

        Route::get('/edit/{id}', ['as' => 'getEditSettings', 'uses' => 'AdminController@getEditSettings']);

        Route::post('/edit/{id}', ['as' => 'postEditSettings', 'uses' => 'AdminController@postEditSettings']);

    });

    Route::group(['prefix' => 'categories'], function (){

        Route::get('/', ['as' => 'categoriesMainPage', 'uses' => 'AdminController@getCategories']);

        Route::get('/new', ['as' => 'getNewCategory', 'uses' => 'AdminController@getNewCategory']);

        Route::post('/new', ['as' => 'postNewCategory', 'uses' => 'AdminController@postNewCategory']);

        Route::get('/new/{id}', ['as' => 'getEditCategory', 'uses' => 'AdminController@getEditCategory']);

        Route::post('/new/{id}', ['as' => 'postEditCategory', 'uses' => 'AdminController@postEditCategory']);

        Route::get('/delete/{id}', ['as' => 'categoryDelete', 'uses' => 'AdminController@deleteCategory']);

    });

});

