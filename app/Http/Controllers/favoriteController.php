<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class favoriteController extends Controller
{

    public function favorite (Post $post)
    {
        Auth::user()->favorites()->attach($post->id);

        return redirect()
            ->route('showPost', $post);
    }


    public function unFavorite (Post $post)
    {
        Auth::user()->favorites()->detach($post->id);

        return redirect()
            ->route('showPost', $post);
    }

    public function getFavoriteList ()
    {
        $posts = Auth::user()->favorites()->get();

        return view('mypage.favoriteList', ['posts' => $posts]);
    }

}
