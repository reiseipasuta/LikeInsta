<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <title>{{ $title }} - LikeInsta</title>
</head>
<body>
    <div class="container">
        <div class="titlemenu">
            <a href="{{ route('top') }}"><h1 class="name">Like Insta</h1></a>
            <div class="menu">
                <div class="link"><a href="{{ route('dashboard') }}">会員メニュー</a></div>
                <div class="link"><a href="{{ route('getForm') }}">新規投稿</a></div>
                <div class="link"><a href="{{ route('ranking') }}">いいねランキング</a></div>
            </div>
        </div>

            {{ $slot }}
    </div>
</body>
</html>

