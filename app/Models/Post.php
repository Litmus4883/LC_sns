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
        return $this->belongsToMany(Tug::class);
    }
    
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
