<x-app-layout><!-- -->

    <!-- <h1>Blog Name</h1>-->
    <x-slot name="header">
        <h2>{{ __('投稿一覧') }}</h2>
    </x-slot>
    
    <!-- 新規作成-->
    <div class="bg-pink-100 m-2 p-4 rounded-full text-xl ">
    <a class="" href='/posts/create'>新規作成</a>
    </div>
    
    <!-- ポスト一覧-->
    <!--ここの$postsはPostControllerで指定した変数-->
    <div class="mx-12 grid grid-cols-3 place-items-center">
    @foreach ($posts as $post)
    <!-- 一つひとつのポスト-->
    <div style="border-width: 8px;" class="bg-white border-black border-dashed post m-4 px-6 pt-6 rounded-xl ">
        
        <!-- ユーザー名-->
        <div class="bg-white border-black border-b text-xl ">
        <h2 class='user_name font-bold'>
            <a href="/user/{{ $post->user->id }}">{{ $post->user->name }}</a> さん
        </h2>
        </div>
        
        <!-- 投稿内容-->
        <div class="bg-white text-xl ">
        <h2 class='comment border-black border-b'>
            <a href="/posts/{{ $post->id }}">{{ $post->comment }}</a>
        </h2>
        </div>
        
        <!-- 画像-->
        @if($post->images->isNotEmpty())
            <div class='bg-white images overflow-hidden flex items-center justify-center  w-[300px] h-[150px]'>
                @foreach($post->images as $image)
                    <img class="object-cover" src="{{ $image->image_url }}" alt="画像が読み込めません。"/>
                @endforeach
            </div>
        @endif
        
        <!-- タグ-->
        @foreach($post->tugs as $tug)
        <div class="bg-white border-gray-200 border m-2 p-2 inline-block text-base rounded-xl">
        <a href="">{{ $tug->name }}</a>
        </div>
        @endforeach

    </div>
    @endforeach
    </div>    
    <!-- ペジネーション-->
    <div class="bg-white paginate flex items-center justify-center">
        {{ $posts->links() }}
    </div>
    <!-- ログインユーザー名-->
    <div class="bg-white px-6 py-4 rounded fixed bottom-0 left-0">
    <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </div>
    
</x-app-layout>