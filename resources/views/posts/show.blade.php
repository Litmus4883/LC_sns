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
            <h2>{{ __('投稿詳細') }}</h2>
        </x-slot>
    <body>
        <h1>Blog Name</h1>
            <div class='post'>
                <h1 class='comment'>{{ $post->comment }}</h1>
                <div class='images'>{{ $post->image }}</div>
            </div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </body>
    </x-app-layout>
</html>