<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function counts($user) {
        //投稿数のカウント
        $count_microposts = $user->microposts()->count();
        //フォロー中人数のカウント
        $count_followings = $user->followings()->count();
        //フォロワー数のカウント
        $count_followers = $user->followers()->count();
        //お気に入り追加中の投稿のカウント
        $count_favorites = $user->favorites()->count();
        //ある投稿がお気に入りに追加されているカウント
        //$count_get_favorites = $micropost->get_favorites()->count();
        
        return [
            'count_microposts' => $count_microposts,
            'count_followings' => $count_followings,
            'count_followers' => $count_followers,
            'count_favorites' => $count_favorites,
            //'count_get_favorites' => $count_get_favorites,
        ];
    }
}

