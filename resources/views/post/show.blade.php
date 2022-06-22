<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>内容 - LikeInsta</title>
</head>
<body>
    <div class="container">
        <div class="titlemenu">
            <h3>内容表示</h3>
            {{$follow}}
            @if ($post->user_id === Auth::id())
            <a href="{{ route('getEditPost', $post) }}" class="menu-a">[edit]</a>
            @endif
        </div>
            @if($follow)
                <form action="{{ route('unFollow', $post) }}" method="post">
                    @csrf
                    <button>フォローを外す</button>
                </form>
            @else
                <form action="{{ route('follow', $post) }}" method="post">
                    @csrf
                    <button>フォローする</button>
                </form>
            @endif

            @if($favorite)
                <form action="{{ route('unFavorite', $post) }}" method="post">
                    @csrf
                    <button>いいねから外す</button>
                </form>
            @else
                <form action="{{ route('favorite', $post) }}" method="post">
                    @csrf
                    <button>いいねする</button>
                </form>
            @endif
            <p>名前：{{ $post->name }}</p>
            <p>タイトル：{{ $post->title }}</p>
            <p>本文：{{ $post->body }}</p>
            <img src="{{ asset($post->image_path) }}" alt="">
            <ul>
                みんなのコメント
                @foreach ($post->comments as $comment)
                <li>{{ $comment->body }}
                @if ($comment->user_id === Auth::id())
                <a href="{{ route('getCommentEdit', $comment->id) }}">[edit]</a>
                @endif
            </li>
                @endforeach
            </ul>


        <div>
            <h3>コメントする</h3>
            <form action="{{ route('commentStore', $post) }}" method="post">
                @csrf
                <input type="text" name="body">
                <button>送信</button>
            </form>
        </div>

            <a href="{{ route('top') }}">トップへ戻る</a>
    </div>
</body>
</html>
