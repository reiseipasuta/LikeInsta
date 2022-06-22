<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Post_user;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Models\Comment;


class postsController extends Controller
{

    public function showPost (Post $post)
    {
        // $follow = DB::table('follow_users')->where('followed_user_id', $post->user_id)->exists();
        $follow = Auth::user()->follows()->where('followed_user_id', $post->user_id)->exists();

        $favorite = Auth::user()->favorites()->where('post_id', $post->id)->exists();
        // $favorite = DB::table('post_user')->where('post_id', $post->id)->exists();

        return view('post.show')
            ->with(['post' => $post, 'follow' => $follow, 'favorite' => $favorite]);
    }

    public function showMyPost ()
    {
        $posts = Post::whereUser_id(Auth::id())->get();
        $name = Auth::user()->name;

        return view('post.showUserPost')
            ->with(['posts' => $posts, 'name' => $name]);
    }


    public function getForm ()
    {
        return view('post.form');
    }

    public function confirm (Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:200',
            'img' => 'required'
        ], [
            'title.required' => 'タイトルは必須です',
            'title.max' => '２０文字以下で入力してください',
            'body.required' => '本文は必須です',
            'body.max' => '２００文字以下で入力してください',
            'img.required' => '画像を添付してください',
        ]);

        // if($request->img){}
        // $extension = $request->file("img")->getClientOriginalExtension();

        //         // 画像を読み込む
        // $image = Image::make($request->file('img'));
        // // EXIFのOrientationによって回転させる
        // $image->orientate();
        // // リサイズする
        // $image->resize(300, null,
        // function ($constraint) {
        // // 縦横比を保持したままにする
        // $constraint->aspectRatio();
        // // 小さい画像は大きくしない
        // $constraint->upsize();
        // }
        // );
        // // 保存する
        // $image->save(storage_path('***/*****.png'));



        // ↓画像の保存場所
        $img = $request->file('img')->store('public/temp');
        $img_path = str_replace('public/', 'storage/', $img);
        // サーバーにアップした段階でpublicがルートフォルダ（一番上のフォルダ）になる為、bladeで読み込む為のリンクはstrageからになる。

        // ↓ファイル名を取り出す為のコード
        // $filename = str_replace('public/temp', '', $img);

        // 画像リサイズ
        // $image = Image::make($request->file('img'))->orientate();
        // $image->resize(
        //     null,
        //     300,
        //     function ($constraint) {
        //         // 縦横比を保持したままにする
        //         $constraint->aspectRatio();
        //         // 小さい画像は大きくしない
        //         $constraint->upsize();
        //     }
        // );
        // $image->save('storage/temp/a.jpg');


        $data = array(
            'title' => $request->title,
            'body' => $request->body,
            'img' => $img,
            'img_path' => $img_path,
            // 'img' => 'storage/temp/a.jpg',
            // 'img_path' => 'storage/temp/a.jpg',
        );

        return view('post.confirm', compact('data'));

    }

    public function store (Request $request, Post $post)
    {
        // $img = 画像の本当の保存場所(public/temp/??.jpg)
        $img = $request->img;

        // $img_path = viewで画像を表示させる為のURL(storage/temp/??.jpg)
        $img_path = $request->img_path;

        // ↓ファイル名を取り出す為のコード
        $filename = str_replace('storage/temp/', '', $img_path);

        // ↓ファイルを仮フォルダから本番保存フォルダに移動させる為に、移動先のパスを作る為のコード
        $storage_path = "public/image/".$filename;
        // $storage_path = "(config/filesystems.phpでpublic = storage/app/publicになっている為、⇨部分は省略されている⇨storage/app/）public/image/".$filename;

        Storage::move($img, $storage_path);

        // ↓本当の保存場所から、viewで表示させる為のURLへ変更。それをDBに保存する。
        $read_path = str_replace('public/', 'storage/', $storage_path);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->name = Auth::user()->name;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image_path = $read_path;
        $post->save();

// return $storage_path;
        return redirect()
            ->route('top');
    }

    public function getEditPost (Post $post)
    {
        if($post->user_id === Auth::id())
        {
            return view('post.editPost')
                ->with(['post' => $post]);
        }else{
            return view('dashboard');
        }
    }

    public function deletePost (Post $post)
    {
        $post->delete();

        return redirect()
            ->route('top');
    }

    public function editPost (Request $request, Post $post)
    {
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

            return redirect()
                ->route('showPost', $post);
        }

    public function deleteImage (Post $post)
    {
            $post->image_path = 'a';
            $post->save();

            // return $post->image_path;
            return redirect()
                ->route('getEditPost', $post);
        }


    public function getUserPage (User $user)
    {
        $name = $user->name;
        $posts = $user->posts()->get();
        return view('post.showUserPost')
            ->with(['name' => $name, 'posts' => $posts]);
    }

    public function ranking()
    {
        $posts = Post::withCount('favoriteUsers')->orderBy('favorite_users_count', 'desc')->get();
        $comments = Comment::orderBy('id', 'desc')->get();
        // $co = Post::Count('favoriteUsers')->('favorite_users_count', 'desc')->get();
        // return $lists;
        return view('ranking')
        ->with(['posts' => $posts, 'comments' => $comments]);
    }


    }


