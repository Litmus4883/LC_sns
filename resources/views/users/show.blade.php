<x-app-layout>
    <div class='user_profile bg-white p-6 w-3/4 mx-auto'>
        <h2 class="text-2xl">{{ $user->name }}</h2>
        <div class="follow ">
        @if($login_user->isFollowing($user->id))
            <form action="/unfollow/{{$user->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="mt-5 bg-black text-white p-2 rounded-md" type="submit">フォロー中</button>
            </form>
        @else
            <form action="/follow/{{$user->id}}" method="POST">
                @csrf
                <button class="mt-5 bg-black text-white p-2 rounded-md" type="submit">フォローする</button>
            </form>
        @endif
        </div>
    </div>
    <div class="bg-white footer py-2 pl-2">
        <a href="/">戻る</a>
        <h2>ログインユーザー：{{ Auth::user()->name}}</h2>
    </div>
</x-app-layout>