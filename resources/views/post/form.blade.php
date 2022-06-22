<x-layout>
    <x-slot name="title">
        投稿フォーム
    </x-slot>

    <h3>投稿フォーム</h3>
    <form action="{{ route('confirm') }}" method="post" enctype="multipart/form-data" class="">
        @csrf
        <label class="mar">
            <span class="">タイトル</span>
            <input type="text" name="title" class="">
        </label>
        @error('title')
            <div>{{ $message }}</div>
        @enderror
        <label class="mar">
            <span class="mar">本文</span>
            <textarea name="body" class=""></textarea>
        </label>
        @error('body')
            <div>{{ $message }}</div>
        @enderror
        <label>
            画像をアップロードする
            <input type="file" name="img">
        </label>
        @error('img')
            <div>{{ $message }}</div>
        @enderror
        <button class="mar">確認画面へ</button>
    </form>
    <a href="{{ route('top') }}">トップへ戻る</a>
</x-layout>
