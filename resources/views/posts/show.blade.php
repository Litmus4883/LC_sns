<x-app-layout>
    
    <x-slot name="header">
        <h2>{{ __('投稿詳細') }}</h2>
    </x-slot>
    
        <div class='post'>
            <h1>Body</h1>
            <h1 class='comment'>{{ $post->comment }}</h1>
            @if($post->images->isNotEmpty())
                <div class='images'>
                    @foreach($post->images as $image)
                        <img src="{{ $image->image_url }}" alt="画像が読み込めません。"/>
                    @endforeach
                </div>
            @endif
            @foreach($post->tugs as $tug)
                <a href="">{{ $tug->name }}</a>
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
                    <input class="form-control reply-input border-0" placeholder="リプライ" autocomplete="off" type="text" name="reply" />
                    <p>
                        <input type="submit" value="送信"/>
                    </p>
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
    
</x-app-layout>
