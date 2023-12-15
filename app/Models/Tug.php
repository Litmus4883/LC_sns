<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tug extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    
    public function getByTug(int $limit_count = 5)
    {
     return $this->posts()->with('tug')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
