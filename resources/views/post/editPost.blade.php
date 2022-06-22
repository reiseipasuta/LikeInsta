<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>投稿編集 - LikeInsta</title>
</head>
<body>
    <div class="container">
        <h3>投稿内容編集</h3>
            <p>名前：{{ $post->name }}</p>
            <form action="{{ route('editPost', $post) }}" method="post">
                @csrf
                @method('PATCH')
                タイトル：<input type="text" name="title" value="{{ old('title', $post->title) }}">
                本文：<textarea name="body">{{ old('body', $post->body) }}</textarea>
                画像：
                <img src="{{ asset($post->image_path) }}" alt="">

<br>
<br>
<br>

                <button>編集</button>
            </form>
            <form action="{{ route('deleteImage', $post) }}" method="post">
                @csrf
                @method('PATCH')
                <button>画像を削除する</button>
            </form>
            <form action="{{ route('deletePost', $post) }}" method="post">
                @csrf
                <button>投稿を削除する</button>
            </form>

            <a href="{{ route('top') }}">トップへ戻る</a>
    </div>
</body>
</html>
