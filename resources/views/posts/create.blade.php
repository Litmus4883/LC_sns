<x-app-layout>
    <!-- name属性に代入される値は往々にして変数である-->
    <!-- したがって、ここでのheaderは$headerを指す-->
    <x-slot name="header">
        <h2>{{ __('投稿作成') }}</h2>
    </x-slot>

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
                <input type="file" name="images[]" accept="image/*" multiple onchange="loadImage(this);">
            </div>
            <div id="preview"></div>
            <div class='tugs'>
                
                <h2>タグ付け</h2>
                
                <p class="add--btn">add form</p>
            
                <input type="text" class="add--form" name="tug[0]" placeholder="タグ付け"/>
                <div class ="form--area"></div>
            </div>
            
            <input type="submit" value="送信"/>
        </div>
    </form>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
    <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    
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
            createInputEl.placeholder="text"
            createInputEl.className="add--form rounded-[10px]"
            createInputEl.name=`tug[${inputAllEl.length}]`
            formArea.appendChild(createInputEl);
        })
    </script>

</x-app-layout>
    
    