<x-app-layout><!-- -->
    
    <x-slot name="header">
        <h2>{{ __('投稿詳細') }}</h2>
    </x-slot>
    
    <div class="bg-white p-6 w-3/4 mx-auto">
        <div class="post">
            <h1 class="comment m-4">{{ $post->comment }}</h1>
            @if($post->images->isNotEmpty())
                <div class='images'>
                    @foreach($post->images as $image)
                        <img src="{{ $image->image_url }}" alt="画像が読み込めません。"/>
                    @endforeach
                </div>
            @endif
            @foreach($post->tugs as $tug)
                <a class="bg-white border-gray-200 border m-2 p-2 inline-block rounded-xl" href="">{{ $tug->name }}</a>
            @endforeach
        </div>
        <div class="card-body line-height">
            <!-- 作成日時-->
            <a class="light-color post-time no-text-decoration" href="/posts/{{ $post->id }}">{{ $post->created_at }}</a>
            <!-- いいね-->
            <div class="m-4">
                @auth
                    @if($post->is_liked_by_auth_user())
                        <i class="text-4xl like-toggle fas fa-heart liked" data-id="{{ $post->id }}"></i>
                        <span class="like-counter text-2xl">{{ $post->likes->count() }}</span>
                    @else
                        <i class="text-4xl like-toggle fas fa-heart" data-id="{{ $post->id }}"></i>
                        <span class="text-2xl like-counter">{{ $post->likes->count() }}</span>
                    @endif
                @endauth
                @guest
                    @if($post->is_liked_by_auth_user())
                        <a class="w-11 block"href="/login"><i class="w-full block like-toggle fas fa-heart liked" data-id="{{ $post->id }}"></i></a>
                        <span class="like-counter">{{ $post->likes->count() }}</span>
                    @else
                        <a class="w-11"href="/login"><i class="w-full like-toggle fas fa-heart" data-id="{{ $post->id }}"></i></a>
                        <span class="like-counter">{{ $post->likes->count() }}</span>
                    @endif
                @endguest
            </div>
            <hr>
            <!-- リプライ-->
            <div class="row actions" id="reply-form-post-{{ $post->id }}">
                <form class="" id="new_reply" action="/posts/{{ $post->id }}/replies" accept-charset="UTF-8" data-remote="true" method="post">
                    <input name="utf8" type="hidden" value="&#x2713;" />
                    @csrf
                    <input value="{{ $post->id }}" type="hidden" name="post_id" />
                    <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                    <input class="form-control reply-input" placeholder="リプライ" autocomplete="off" type="text" name="reply" />
                    <p>
                        <input class="bg-pink-100 my-2 py-1 px-3 rounded" type="submit" value="送信"/>
                    </p>
                </form>
            </div>
        </div>
        <div>
            @foreach($post->replies as $reply)
            <p>{{ $reply->reply}}</p>
            @endforeach
        </div>
    </div>
    
    <div class="bg-white footer pl-2">
        <a href="/">戻る</a>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </div>
    
    <script>
    //DOMの読み込みが完了してから操作できるようにする
    document.addEventListener('DOMContentLoaded', function() {
        //いいねボタン要素取得（ここを押したらfetchへ行く）
        const like = document.querySelector('.like-toggle');
        //いいねを押したarticleのidを格納する変数が必要なので宣言
        let likePostId;
        like.addEventListener('click', function(e) {
            let target = e.target;
            console.log(target);
            //いいねボタン要素に格納したデータ属性の記事idを取得
            likePostId = target.getAttribute('data-id');
            //fetchを使うことでURLにデータをアップロードすることができる。下記では
            fetch('/like', {
                //リクエスト形式
                method: 'POST',
                headers: {
                    //Content-Typeでクライアントがサーバーに送ったデータの種類を伝える。今回はapplication/jsonでJSONファイルを指定
                    'Content-Type': 'application/json',
                    //正規のcsrfトークンであることを記載
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ post_id: likePostId })
            })
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('ドンマイ');
                }
            })
            .then(function(data) {
                target.classList.toggle('liked');
                target.nextElementSibling.innerHTML = data.likes_count;
            })
            .catch(function() {
                console.log('fail');
            });
        });
    })
    </script>
        
</x-app-layout>
