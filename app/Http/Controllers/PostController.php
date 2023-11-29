<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        //$post->get()で全件取得
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    #ルーティングで呼び出される関数の引数に該当のModelクラスを追加
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create(Post $post)
    {
        return view('posts.create');
    }
    
    #Post $postで空のpostインスタンスを利用
    public function store(PostRequest $request, Post $post): RedirectResponse
    {
        #$input = ['comment' => 'コメント']
        $input = $request['post'];
        #create($input)とfill($input)->save()は同じ
        $post->create($input);
        return redirect('/posts/' . $post->id);
    }
}
