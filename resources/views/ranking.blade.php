<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>TOP - LikeInsta</title>
</head>
<body>
    <div class="container">
        <div class="titlemenu">
            <h1 class="name">Like Insta</h1>
            <div class="menu">
                <a href="{{ route('dashboard') }}" class="menu-a">会員メニュー</a>
                <a href="{{ route('getForm') }}" class="menu-a">新規投稿</a>
            </div>
        </div>


        <ul>
            <div class="contants">
                @foreach ($posts as $post)
                    <div class="item">
                        <a href="{{ route('showPost', $post) }}">
                        <div class="ranking">◆ {{ $loop->iteration }}位</div>
                                <img src="{{ $post->image_path }}" class="img_top">
                            <div class="contants_text">
                                name:{{ $post->name }}<br>
                                title:{{ $post->title }}<br>
                                comment:{{ $post->body }}<br>
                                みんなのコメント：<br>
                                @foreach ($comments as $comment)
                                    @if($comment->post_id === $post->id)
                                        @if($loop->iteration === 4)
                                            @break
                                        @else
                                            {{ $comment->body }}<br>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </a>
                    </div>
                @endforeach
        </ul>

        <a href="{{ route('top') }}">トップへ戻る</a>
    </div>


</body>
</html>
