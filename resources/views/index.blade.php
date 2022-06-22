<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>LikeInsta</title>
</head>
<body class="">

    <h1 class="font-mono text-center mt-20 text-5xl">Like Insta</h1>

        <div class="mt-20 text-center bg-gradient-to-r from-teal-100 to-purple-100 h-10">
            <a href="{{ route('login') }}" class="inline-block align-middle mr-10">login</a>
            <a href="{{ route('register') }}" class="inline-block align-middle">register</a>
        </div>

</body>
</html>
