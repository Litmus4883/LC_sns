<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    
    
    public function getPaginateByLimit(int $limit_count = 3)
    {
        return $this::orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    #複数代入
    protected $fillable = [
        'comment',
        'tug_id',
    ];
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
    public function tugs()
    {
        return $this->belongsToMany(Tug::class,'post_tug', 'post_id', 'tug_id');
    }
}
