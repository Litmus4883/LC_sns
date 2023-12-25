<x-app-layout><!-- -->
    
    <!-- name属性に代入される値は往々にして変数である-->
    <!-- したがって、ここでのheaderは$headerを指す-->
    <x-slot name="header">
        <h2>{{ __('編集画面') }}</h2>
    </x-slot>
    
    <div class="bg-white post_parent p-6 w-3/4 mx-auto">
    <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- 投稿全体-->
        <div class="post">
            <!-- 本文-->
            <div class="comment ">
                <input class="w-full my-2 mt-8" type="text" name="post[comment]" placeholder="ポスト" value="{{ $post->comment }}"/>
                <p class="comment_error" style="color:red">{{ $errors->first('post.comment') }}</p>
            </div>
            
            <!-- 画像-->
            <div class="images ">
                <input class="my-2" value="{{ $post->image_url }}" type="file" name="images[]" accept="image/*" multiple onchange="loadImage(this);">
            <!-- プレビュー表示-->
                <div id="preview"></div>
            </div>
            
            <!-- タグ-->
            <div class="tugs">
                <p class="add--btn bg-pink-100 rounded-full my-2 p-1">クリックしてフォームを追加</p>
                <input type="text" class="add--form my-2 rounded" name="tug[0]" placeholder="タグ"/>
                <div class="form--area"></div>
            </div>
            
            <!-- 送信ボタン-->
            <input class="bg-pink-100 my-2 py-1 px-3 rounded" type="submit" value="更新"/>
        </div>
    </form>
    
    </div>
    
    <div class="bg-white footer pl-2">
        <a href="/">戻る</a>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </div>
    
    <script>
    function loadImage(obj)
    {
        console.log('ok')
        document.getElementById('preview').innerHTML = '<p>プレビュー</p>';
        for (i = 0; i < obj.files.length; i++) {
            var fileReader = new FileReader();
            fileReader.onload = (function (e) {
            console.log(e)
                document.getElementById('preview').innerHTML += '<img src="' + e.target.result + '">';
            });
            fileReader.readAsDataURL(obj.files[i]);
        }
    }
    
    const btnEl = document.querySelector('.add--btn');
        console.log(btnEl)
        btnEl.addEventListener('click',() => {
            const inputAllEl = document.querySelectorAll('.add--form');
            const formArea =  document.querySelector('.form--area');
            const createInputEl = document.createElement('input');
            createInputEl.type="text"
            createInputEl.placeholder="タグ"
            createInputEl.className="add--form rounded"
            createInputEl.name=`tug[${inputAllEl.length}]`
            formArea.appendChild(createInputEl);
        })
    </script>

</x-app-layout>