<x-layout>
    <x-slot name="title">
    フォローリスト
    </x-slot>

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

</x-layout>
