<x-app-layout>
    
    <x-slot name="header">
        <h2>{{ __('プロフィール') }}</h2>
    </x-slot>
    
    <div class='myprofile text-2xl bg-white p-6 w-3/4 mx-auto'>
        
        <h2 class="p-6">ユーザー名：{{ Auth::user()->name}}</h2>
        
        <div class="followee ">
            <p class="ml-2">フォロー中：<span class="">{{ $login_user->followees->count() }}</span></p>
            <ul class="rounded-md bg-gray-200 p-2 h-12 overflow-scroll">
                @foreach($login_user->followees as $followee)
                <li><a href={{ "/user/". $followee->id }}>{{ $followee->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="follower">
            <p class="ml-2">フォロワー：<span class="">{{ $login_user->followers->count() }}</p>
            <ul class="rounded-md bg-gray-200 p-2 h-12 overflow-scroll">
                @foreach($login_user->followers as $follower)
                <li><a href="">{{ $follower->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="footer bg-white">
        <a href="/">戻る</a>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </div>
</x-app-layout>