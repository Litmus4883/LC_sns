<x-app-layout><!-- -->

    <!-- <h1>Blog Name</h1>-->
    <x-slot name="header">
        <h2>{{ __('投稿一覧') }}</h2>
    </x-slot>
    
    <!-- 新規作成-->
    <div class="bg-blue-300 w-20 text-xl">
    <a href='/posts/create'>新規作成</a>
    </div>
    
    <!-- ポスト一覧-->
    <!--ここの$postsはPostControllerで指定した変数-->
    <div class="grid grid-cols-3">
    @foreach ($posts as $post)
    <!-- 一つひとつのポスト-->
    <div class="bg-purple-300 post mx-auto w-3/4 p-5 rounded-[15px] ">
        
        <!-- ユーザー名-->
        <div class="bg-pink-300 text-xl ">
        <h2 class='user_name font-bold'>
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
        <div class="bg-blue-600 images w-[200px] h-[150px] ">
            <img class="block object-cover w-full h-full" src="{{ $post->images }}"/>
        </div>
        
        @foreach($post->tugs as $tug)
        <!-- タグ-->
        <div class="bg-indigo-300">
        <a href="">{{ $tug->name }}</a>
        </div>
        @endforeach
    </div>
    @endforeach
    </div>    
    <!-- ペジネーション-->
    <div class="bg-purple-300 paginate flex items-center justify-center">
        {{ $posts->links() }}
    </div>
    <!-- ログインユーザー名-->
    <div class="bg-pink-300">
    <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </div>
    
</x-app-layout>