
    <link href="{{ asset('app/style.css') }}" rel="stylesheet">
<div class="block">
    @if ($paginator->hasPages())

        <!-- 前へ移動ボタン -->
        @if ($paginator->onFirstPage())
        <img class="yajirusi" src="https://chicodeza.com/wordpress/wp-content/uploads/yajirushi-illust72.png" alt="">
        @else
                <a href="{{ $paginator->previousPageUrl() }}">
                    <img class="yajirusi" src="https://chicodeza.com/wordpress/wp-content/uploads/yajirushi-illust72.png" alt="">
                </a>
        @endif

        <!-- ページ番号　-->
        
        @foreach ($elements as $element)
            @if (is_string($element))
                    {{ $element }}
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                            {{ $page }}
                    @else
                            <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- 次へ移動ボタン -->
        @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">
                    <img class="yajirusi" src="https://chicodeza.com/wordpress/wp-content/uploads/yajirushi-illust71.png" alt="">
                </a>
        @else
                <img class="yajirusi" src="https://chicodeza.com/wordpress/wp-content/uploads/yajirushi-illust71.png" alt="">
        @endif

@endif


