<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>健全なsns</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='myprofile'>
            <h2>{{ Auth::user()->name}}のプロフィール詳細</h2>
            <div class="followee">
                <p>フォロー中：<span class="text-4xl">{{ $user->followees->count() }}</span></p>
                <ul class="rounded-md bg-gray-200 p-2 h-12 overflow-scroll">
                    @foreach($user->followees as $followee)
                    <li><a href="">{{ $followee->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="follower">
                <p>フォロワー：<span class="text-4xl">{{ $user->followers->count() }}</p>
                <ul class="rounded-md bg-gray-200 p-2 h-12 overflow-scroll">
                    @foreach($user->followers as $follower)
                    <li><a href="">{{ $follower->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </body>
</html>