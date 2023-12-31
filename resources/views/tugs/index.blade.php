<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>健全なsns</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2>{{ __('投稿一覧') }}</h2>
        </x-slot>
    <body>
        <h1>Blog Name</h1>
        <a href='/posts/create'>新規作成</a>
        <div class='posts'>
            <!--ここの$postsはPostControllerで指定した変数-->
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='comment'>
                        <a href="/posts/{{ $post->id }}">{{ $post->comment }}</a>
                    </h2>
                    <div class='images'>{{ $post->image }}</div>
                    
                    @foreach($post->tugs as $tug)
                    <a href="/tugs/{{ $post->tug->id }}">{{ $post->tug->tug }}</a>
                    @endforeach
                </div>
            @endforeach
            
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </body>
    </x-app-layout>
</html>