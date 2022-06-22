<x-layout>
    <x-slot name="title">
        会員メニュー
    </x-slot>

    <h2>会員メニュー</h2>
    <ul>
        <li>
            <a href="{{ route('showMyPost') }}">投稿一覧</a>
        </li>
        <li>
            <a href="{{ route('getFollowList') }}">フォロー一覧</a>
        </li>
        <li>
            <a href="{{ route('getFollowerList') }}">フォロワー一覧</a>
        </li>
        <li>
            <a href="{{ route('favoriteList') }}">いいねした投稿</a>
        </li>
        <li>
            <form method="post" action="{{ route('logout') }}">
            @csrf
          <button class="buttun_menu">ログアウト</button>
            </form>
        </li>

    </ul>
    <a href="{{ route('top') }}">トップへ戻る</a>
</x-layout>
