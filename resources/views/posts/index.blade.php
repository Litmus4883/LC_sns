<x-app-layout><!-- -->

    <!-- <h1>Blog Name</h1>-->
    <x-slot name="header">
        <h2>{{ __('投稿一覧') }}</h2>
    </x-slot>
    <!-- 新規作成-->
    <div class="bg-blue-300 text-xl ">
    <a href='/posts/create'>新規作成</a>
    </div>
    <!-- ポスト一覧-->
    <div class='posts' class="bg-indigo-300">
        <!--ここの$postsはPostControllerで指定した変数-->
        @foreach ($posts as $post)
            <!-- 一つひとつのポスト-->
            <div class="bg-purple-300 post ">
                <div class="bg-pink-300 text-xl ">
                <h2 class='user_name'>
                    <a href="/user/{{ $post->user->id }}">{{ $post->user->name }}</a> さん
                </h2>
                </div>
                <!-- 投稿内容-->
                <div class="bg-green-300 text-xl ">
                <h2 class='comment'>
                    <a href="/posts/{{ $post->id }}">{{ $post->comment }}</a>
                </h2>
                </div>
                <!-- 画像-->
                <div class="bg-blue-300 images ">{{ $post->image }}</div>
                
                @foreach($post->tugs as $tug)
                <!-- タグ-->
                <div class="bg-indigo-300">
                <a href="">{{ $tug->tug }}</a>
                </div>
                @endforeach
            </div>
        @endforeach
        
    </div>
    <!-- ペジネーション-->
    <div class="bg-purple-300 paginate ">
        {{ $posts->links() }}
    </div>
    <!-- ログインユーザー名-->
    <div class="bg-pink-300">
    <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </div>
    
</x-app-layout>