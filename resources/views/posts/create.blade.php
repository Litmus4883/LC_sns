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
            <h2>{{ __('投稿作成') }}</h2>
        </x-slot>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div class='post'>
                <div class='comment'>
                    <h2>本文</h2>
                    <input type="text" name="post[comment]" placeholder="ポスト" value="{{ old('post.comment') }}"/>
                    <p class="comment_error" style="color:red">{{ $errors->first('post.comment') }}</p>
                </div>
                
                <div class='image'>
                    <input type="file" name="images[]" id="images" accept="image/*" multiple>
                </div>
                
                <div class="tugs">
                    <h2>タグ</h2>
                    <select name="post[tug_id]">
                        @foreach($tugs as $tug)
                            <option value="{{ $tug->id }}">{{ $tug->tug }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="送信"/>
            </div>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </body>
    </x-app-layout>
</html>