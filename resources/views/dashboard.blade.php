<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                    </ul>
                    <a href="{{ route('top') }}">トップへ戻る</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
