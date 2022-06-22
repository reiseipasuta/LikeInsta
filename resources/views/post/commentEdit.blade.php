<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>コメント編集 - LikeInsta</title>
</head>
<body>
    <div class="container">
        <h3>コメント編集</h3>
            <p>名前：{{ $comment->name }}</p>
            <form action="{{ route('commentEdit', $comment) }}" method="post">
                @csrf
                @method('PATCH')
                <input type="text" name="body" value="{{ old('body', $comment->body) }}">
                <button>編集</button>
            </form>
            <form action="{{ route('commentDelete', $comment) }}" method="post">
                @csrf
                <button>コメントを削除する</button>
            </form>

            <a href="{{ route('top') }}">トップへ戻る</a>
    </div>
</body>
</html>
