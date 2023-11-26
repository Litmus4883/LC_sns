<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
}
