<x-layout>
    <x-slot name="title">
        投稿内容
    </x-slot>

    <div class="titlemenu">
        <h2>内容表示</h2>
    </div>
    <div class="show_manu">
        @if ($post->user_id === Auth::id())
        <a class="edit" href="{{ route('getEditPost', $post) }}" class="menu-a">編集</a>
        @endif

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
    </div>
        <p>名前：{{ $post->name }}</p>
        <p>タイトル：{{ $post->title }}</p>
        <p>本文：{{ $post->body }}</p>
        <img src="{{ asset($post->image_path) }}" alt="">
        <h2>みんなのコメント</h2>
        <ul>
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
            <input type="text" name="body" class="comment_form">
            <button>送信</button>
        </form>
    </div>

        <a href="{{ route('top') }}">トップへ戻る</a>
</x-layout>
