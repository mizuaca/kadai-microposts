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
Route::get('/', 'WelcomeController@index');

//メソッドチェーン
//『「sign up」にアクセスすると「AuthController」の「getRegister」処理を実行する』
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
//『「sign up」にアクセスすると「AuthController」の「postRegister」処理を実行する』
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

//ログイン認証用
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');

//ログアウト機能
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

//ログイン認証条件つきルーティング
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
     Route::group(['prefix' => 'users/{id}'], function () { 
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });
    
     Route::group(['prefix' => 'microposts/{id}'], function () { 
        Route::post('favorite', 'UserFavoriteController@store')->name('user.favorite');
        Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('user.unfavorite');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');//お気に入りした投稿一覧
        Route::get('get_favorites', 'MicropostsController@get_favorites')->name('users.get_favorites');//投稿にお気に入りしている人一覧
    });
    
    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
});