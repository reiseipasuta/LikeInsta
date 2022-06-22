<x-layout>
    <x-slot name="title">
        TOP
    </x-slot>

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
    <div class="link-n">{{ $posts->links() }}</div>

</x-layout>

