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

Route::group(['middleware' => 'locale', 'prefix' => 'admin'], function() {
        
    Route::get('/', function() {
        return view('layouts.home');
    });

    Route::get('/employees', function() {
        return view('layouts.admin.employee');
    });

});

Route::get('change-language/{language}', 'LanguageController@changeLanguage')->name('user.change-language');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function() {
    return view('layouts.home');
});

Route::post('auth/register', 'UserController@register');

Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user-info', 'UserController@getUserInfo');
});