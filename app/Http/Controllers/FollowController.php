<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use App\Models\User;

class FollowController extends Controller
{   
    public function show(User $user)
    {
        $login_user = Auth::user();
        return view('users.show')->with([
            'user' => $user,
            'login_user' => $login_user,
        ]);
    }
    
    public function follow(User $user, Follow $follow)
    {
        $follow->follower_id = \Auth::id();
        $follow->followee_id = $user->id;
        $follow->save();
        return redirect('/users/'. $user->id);
    }
    
    public function unfollow(User $user, Follow $follow)
    {
        $followee = Auth::user();
        $is_following = $followee->isFollowing($user->id);
        
        if ($is_following) {
            $followee->modelUnFollow($user->id);
        }
        
        return redirect('/users/'. $user->id);
    }
}