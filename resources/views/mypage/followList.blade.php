<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>{{ $title }}一覧 - LikeInsta</title>
</head>
<body>
    <div class="container">
        {{ $title }}ユーザー一覧
        <ul>
            @foreach ($lists as $list)
            <a href="{{ route('getUserPage', $list) }}">
                <li>{{ $list->name }}</li>
            </a>
            @endforeach
        </ul>

        <a href="{{ route('dashboard') }}">メニューへ戻る</a>
        <a href="{{ route('top') }}">トップへ戻る</a>
    </div>


</body>
</html>
