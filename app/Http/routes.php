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

//デフォルト
Route::get('/', function () {
    return view('welcome');
});

//メソッドチェーン
//『「sign up」にアクセスすると「AuthController」の「getRegister」処理を実行する』
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
//『「sign up」にアクセスすると「AuthController」の「postRegister」処理を実行する』
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

//ログイン認証用
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');


Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');
