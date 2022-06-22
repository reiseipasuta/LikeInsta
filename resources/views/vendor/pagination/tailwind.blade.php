
    <link href="{{ asset('app/style.css') }}" rel="stylesheet">
<div class="block">
    @if ($paginator->hasPages())

        <!-- 前へ移動ボタン -->
        @if ($paginator->onFirstPage())
             ⇦前へ
        @else
                <a href="{{ $paginator->previousPageUrl() }}">
                    ⇦前へ
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
                    次へ⇨
                </a>
        @else
                次へ⇨
        @endif
    </nav>
@endif

</div>
