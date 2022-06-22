<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <title>TOP - LikeInsta</title>
</head>
<body>
    <div class="container">
        <div class="titlemenu">
            <h1 class="name">Like Insta</h1>
            <div class="menu">
                <div class="link"><a href="{{ route('dashboard') }}">会員メニュー</a></div>
                <div class="link"><a href="{{ route('getForm') }}">新規投稿</a></div>
                <div class="link"><a href="{{ route('ranking') }}">いいねランキング</a></div>
            </div>
        </div>

        <div class="contants">
            @foreach ($posts as $post)
                <div class="item">
                    <a href="{{ route('showPost', $post) }}">
                    <div class="top_image">
                        <img src="{{ $post->image_path }}" class="img_top rounded-pill">
                    </div>
                    <div class="content_text">
                        <div class="contants_text1"><span class="left">name:</span>{{ $post->name }}</div>
                        <div class="contants_text2"><span class="left">title:<span>{{ $post->title }}</div>
                        <div class="contants_text3"><span class="left">comment:</span>{{ $post->body }}</div>
                        <div class="contants_comment">
                            みんなのコメント：<br>
                        @php
                            $i = 0
                        @endphp
                        @foreach ($post->comments as $comment)
                        @if($loop->index < 3)
                        {{ $comment->body }}<br>
                    @endif
                        @endforeach
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>


</body>
</html>

