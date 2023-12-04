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
        
            <div class='post'>
                <h1>Body</h1>
                <h1 class='comment'>{{ $post->comment }}</h1>
                <div class='images'>{{ $post->image }}</div>
                @foreach($post->tugs as $tug)
                    <a href="">{{ $tug->tug }}</a>
                @endforeach
            </div>
            <div class="card-body line-height">
                <a class="light-color post-time no-text-decoration" href="/posts/{{ $post->id }}">{{ $post->created_at }}</a>
                <hr>
                <div class="row actions" id="reply-form-post-{{ $post->id }}">
                    <form class="w-100" id="new_reply" action="/posts/{{ $post->id }}/replies" accept-charset="UTF-8" data-remote="true" method="post">
                        <input name="utf8" type="hidden" value="&#x2713;" />
                        @csrf
                        <input value="{{ $post->id }}" type="hidden" name="post_id" />
                        <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                        <input class="form-control reply-input border-0" placeholder="リプライ..." autocomplete="off" type="text" name="reply" />
                        <input type="submit" value="store"/>
                    </form>
                </div>
            </div>
            <div>
                @foreach($post->replies as $reply)
                <p>{{ $reply->reply}}</p>
                @endforeach
            </div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </body>
    </x-app-layout>
</html>