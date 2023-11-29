<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    
    public function getPaginateByLimit(int $limit_count = 3)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    #複数代入
    protected $fillable = [
        'comment',
    ];
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
