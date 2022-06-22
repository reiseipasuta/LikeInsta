<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Follow_user;

class followController extends Controller
{
    public function follow(Post $post)
    {
        Follow_user::create([
            'following_user_id' => Auth::id(),
            'followed_user_id' => $post->user_id,
        ]);
            // Auth::user()->follows()->attach( $post->user_id );

            return redirect()
            ->route('showPost', $post);
    }

    public function unFollow(Post $post)
    {
        Auth::user()->follows()->detach( $post->user_id );
        return redirect()
            ->route('showPost', $post);
    }

    public function getFollowList()
    {
        $lists = Auth::user()->follows()->get();
        $title = 'フォロー';

        return view('mypage.followList')
            ->with(['lists' => $lists, 'title' => $title]);
    }

    public function getFollowerList()
    {
        $lists = Auth::user()->followers()->get();
        $title = 'フォロワー';

        return view('mypage.followList')
            ->with(['lists' => $lists, 'title' => $title]);
    }

}
