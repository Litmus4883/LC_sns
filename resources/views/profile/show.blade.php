<x-app-layout>
    <div class='myprofile'>
        <h2 class='text-4xl'>{{ Auth::user()->name}}のプロフィール詳細</h2>
        <div class="followee">
            <p>フォロー中：<span class="text-4xl">{{ $login_user->followees->count() }}</span></p>
            <ul class="rounded-md bg-gray-200 p-2 h-12 overflow-scroll">
                @foreach($login_user->followees as $followee)
                <li><a href={{ "/user/". $followee->id }}>{{ $followee->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="follower">
            <p>フォロワー：<span class="text-4xl">{{ $login_user->followers->count() }}</p>
            <ul class="rounded-md bg-gray-200 p-2 h-12 overflow-scroll">
                @foreach($login_user->followers as $follower)
                <li><a href="">{{ $follower->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
    <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
</x-app-layout>