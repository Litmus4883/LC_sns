<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>健全なsns</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='user_profile'>
            <h2>{{ $user->name }}</h2>
            @if($login_user->isFollowing($user->id))
                <form action="/unfollow/{{$user->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="mt-5 bg-black text-white p2 rounded-md" type="submit">フォロー中</button>
                </form>
            @else
                <form action="/follow/{{$user->id}}" method="POST">
                    @csrf
                    <button class="mt-5 bg-black text-white p-2 rounded-md" type="submit">フォローする</button>
                </form>
            @endif
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </body>
</html>