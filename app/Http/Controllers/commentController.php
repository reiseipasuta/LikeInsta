<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    public function commentStore (Request $request, Post $post)
    {
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id();
        $comment->name = Auth::user()->name;
        $comment->body = $request->body;
        $comment->save();

        return redirect()
            ->route('showPost', $post);
    }

    public function commentDelete (Comment $comment)
    {
        $comment->delete();
        return redirect()
            ->route('showPost', $comment->post_id);
    }

    public function getCommentEdit (Comment $comment)
    {
        if($comment->user_id === Auth::id())
        {
            return view('post.commentEdit')
            ->with(['comment' => $comment]);
        }else{
            return view('dashboard');
        }
    }


    public function commentEdit (Request $request, Comment $comment)
    {


        $comment->body = $request->body;
        $comment->save();

        return redirect()
            ->route('showPost', $comment->post_id);
    }
}

