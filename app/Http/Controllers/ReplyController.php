<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Post;

class ReplyController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request, Reply $reply, Post $post)
    {
        //dd($request);
        //$input = $request->reply;
        $reply->reply = $request->reply;
        $reply->post_id = $post->id;
        $reply->user_id = \Auth::id();
        $reply->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function destroy(Request $request)
    {
        $reply = Reply::find($request->reply_id);
        $reply->delete();
        return redirect('/');
    }
}
