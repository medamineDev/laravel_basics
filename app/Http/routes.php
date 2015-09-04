<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('auth/about', 'PagesController@about');
Route::get('/articles', 'ArticleController@index');
Route::post('/add_art', 'ArticleController@add_art');




Route::get('/home', [
    'middleware' => 'auth',
    'uses' => 'HomeController@index'
]);



Route::group(['prefix' => 'auth'], function () {


    Route::group(['middleware' => 'locale'], function () {

        Route::get('login', 'Auth\AuthController@getLogin');
        Route::get('register', 'Auth\AuthController@getRegister');
	
	Route::post('register', 'Auth\AuthController@postRegister');
	Route::post('login', 'Auth\AuthController@postLogin');

    });
});


Route::post('ajaxLogin','Auth\AuthController@ajaxLogin');


Route::post('ajaxRegister','Auth\AuthController@ajaxRegister');


Route::get('set_lang/{lang}', 'LocaleController@setLocale');
Route::get('/logout', 'Auth\AuthController@getLogout');



