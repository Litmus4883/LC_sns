<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    
    
    public function getPaginateByLimit(int $limit_count = 6)
    {
        return $this::orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    #複数代入
    protected $fillable = [
        'comment',
        'user_id',
    ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
    public function tugs()
    {
        return $this->hasMany(Tug::class);
    }
    
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function is_liked_by_auth_user()
    {
        $id = \Auth::id();
        //likersを空の配列として定義
        $likers = array();
        //foreachでlikesリレーションを用いて$likeに$thisとlikesテーブルの情報を格納
        foreach($this->likes as $like) {
            //array_pushで配列likersに＄like($thisと関連するikesテーブルの情報、今回は＄articleとlikeテーブル)のuser_idを取得
            array_push($likers, $like->user_id);
        }
        
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
