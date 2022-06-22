<x-layout>
    <x-slot name="title">
        いいねランキング
    </x-slot>

    <h2>いいねランキング</h2>
        <div class="contants">
            @foreach ($posts as $post)
            <a href="{{ route('showPost', $post) }}">
                <div class="item">
                    <div class="top_image">
                        <div class="ranking">◆ {{ $loop->iteration }}位　いいね数：{{ $post->favorite_users_count }}</div>
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
        <div class="link-n">{{ $posts->links() }}</div>

        <a href="{{ route('top') }}">トップへ戻る</a>
</x-layout>
