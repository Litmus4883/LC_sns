<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tug;
use App\Models\Image;
use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;
use Cloudinary;

class PostController extends Controller
{
    public function index(Post $post)
    {
        //$post->get()で全件取得
        return view('posts.index')
        ->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    #ルーティングで呼び出される関数の引数に該当のModelクラスを追加
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create(Post $post, Tug $tug)
    {
        return view('posts.create')->with(['tugs' => $tug->get()]);
    }
    
    #Post $postで空のpostインスタンスを利用
    public function store(PostRequest $request, Post $post, Image $image): RedirectResponse
    {
        #$input = ['comment' => 'コメント']
        $input = $request['post'];
        $input['user_id'] = auth()->user()->id;
        #create($input)とfill($input)->save()は同じ
        $post->fill($input)->save();
        
        if($request->hasfile('images')) {
            $images = $request->file('images');
            
            foreach ($images as $imageFile) {
                $image_url = Cloudinary::upload($imageFile->getRealPath())->getSecurePath();
                #dd($image_url);
                $image = new Image(['image_url' => $image_url]);
                $image->save();
                
                $post->images()->attach($image->id);
            }
        }
        
        return redirect('/posts/' . $post->id);
        }
    
}