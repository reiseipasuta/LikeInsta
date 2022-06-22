<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>投稿 - LikeInsta</title>
</head>
<body>
    <div class="container">
        <h3>投稿画面</h3>
        <form action="{{ route('confirm') }}" method="post" enctype="multipart/form-data" class="">
            @csrf
            <label class="mar">
                <span class="">タイトル</span>
                <input type="text" name="title" class="">
            </label>
            @error('title')
                <div>{{ $message }}</div>
            @enderror
            <label class="mar">
                <span class="mar">本文</span>
                <textarea name="body" class=""></textarea>
            </label>
            @error('body')
                <div>{{ $message }}</div>
            @enderror
            <label>
                画像をアップロードする
                <input type="file" name="img">
            </label>
            @error('img')
                <div>{{ $message }}</div>
            @enderror
            <button class="mar">確認画面へ</button>
        </form>
        <a href="{{ route('top') }}">トップへ戻る</a>
    </div>
</body>
</html>
