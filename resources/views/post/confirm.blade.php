<x-layout>
    <x-slot name="title">
        確認
    </x-slot>

    <h3>確認画面</h3>
        <form action="{{ route('store') }}" method="post" class="">
            @csrf
            <label class="mar">
                <span class="">タイトル</span>
                {{ $data['title'] }}
            </label>
            <label class="mar">
                <span class="mar">本文</span>
                {{ $data['body'] }}
            </label>
            <img src="{{ $data['img_path'] }}" alt="">{{ $data['img'] }}<br>{{ $data['img_path'] }}
            <input type="hidden" name="title" value="{{ $data['title'] }}">
            <input type="hidden" name="body" value="{{ $data['body'] }}">
            <input type="hidden" name="img" value="{{ $data['img'] }}">
            <input type="hidden" name="img_path" value="{{ $data['img_path'] }}">
            <button class="mar">送信</button>
        </form>
        <a href="{{ route('top') }}">トップへ戻る</a>
</x-layout>
