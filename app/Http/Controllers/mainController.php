<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class mainController extends Controller
{
    public function getTop ()
    {
        $posts = Post::with(['comments' => function($query) {
            $query->orderBy('id', 'desc');
        }])->orderBy('id', 'desc')->paginate(6);
        // $posts = Post::orderBy('id', 'desc')->get();
        // $comments = Comment::orderBy('id', 'desc')->get();
        

        return view('top')
            ->with(['posts' => $posts]);
    }
}
