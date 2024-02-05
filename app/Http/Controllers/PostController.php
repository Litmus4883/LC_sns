<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tug;
use App\Models\Image;
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
    
    // Post $postで空のpostインスタンスを利用
    public function store(PostRequest $request, Post $post, Tug $tug, Image $image)
    {
        // $input = ['comment' => 'コメント']
        $input = $request['post'];
        $input['user_id'] = auth()->user()->id;
        # dump($input);
        // create($input)とfill($input)->save()は同じ
        $post->fill($input)->save();
        
        foreach ($request->tug as $tug_content) {
            $tug = new Tug();
            $tug->name = $tug_content;
            $tug->post_id = $post->id;
            $tug->save();
        }
    
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
        
        //public function store(PostRequest $request, Post $post, Tug $tug)
        //{
        //    $tugData = $request['tug'];
        //  $tug = Tug::firstOrCreate($tugData);
        //    $tug->save();
            
        //    $post->tugs()->attach($tug->id);
         //   $post->save();
        //}
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }  
    
    public function update(PostRequest $request, Post $post, Tug $tug, Image $image)
    {
        $input_post = $request['post'];
        // fill/saveを利用することで、全データを無条件で更新するのではなく、差分
        // がある場合のみDBを更新
        $post->fill($input_post)->save();
        
        foreach ($request->tug as $tug_id => $tug_content) {
            $exsistingTug = Tug::find($tug_id);
            
            if($exsistingTug) {
                $exsistingTug->name = $tug_content;
                $exsistingTug->post_id = $post->id;
                $exsistingTug->save();
            }
        }
    
        if($request->hasfile('images')) {
            $images = $request->file('images');
            
            foreach ($images as $imageFile) {
                $image_url = Cloudinary::upload($imageFile->getRealPath())->getSecurePath();
                #dd($image_url);
                $exsistingImage = Image::firstOrCreate(['image_url' => $image_url]);
                $exsistingImage->fill(['image_url' => $image_url])->save();
                $post->images()->sync($exsistingImage->id);
            }
        }
        
        return redirect('/posts/'. $post->id);
    }  
}