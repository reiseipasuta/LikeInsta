<x-layout>
    <x-slot name="title">
        いいねリスト
    </x-slot>
    <h2>いいね一覧</h2>
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

        <a href="{{ route('dashboard') }}">メニューへ戻る</a>
        <a href="{{ route('top') }}">トップへ戻る</a>
</x-layout>
