<x-layout>
    <x-slot name="title">
    フォローリスト
    </x-slot>

        <h2>{{ $title }}ユーザー一覧</h2>
            @foreach ($lists as $list)
            <div class="follow">
            <a href="{{ route('getUserPage', $list) }}">
                {{ $list->name }}
            </a>
            </div>
            @endforeach


        <a href="{{ route('dashboard') }}">メニューへ戻る</a>
        <a href="{{ route('top') }}">トップへ戻る</a>

</x-layout>
