<x-layout>
    <x-slot name="title">
        編集
    </x-slot>

    <h3>コメント編集</h3>
    <p>名前：{{ $comment->name }}</p>
    <form action="{{ route('commentEdit', $comment) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="text" name="body" value="{{ old('body', $comment->body) }}">
        <button>編集</button>
    </form>
    <form action="{{ route('commentDelete', $comment) }}" method="post">
        @csrf
        <button>コメントを削除する</button>
    </form>

    <a href="{{ route('top') }}">トップへ戻る</a>
</x-layout>
