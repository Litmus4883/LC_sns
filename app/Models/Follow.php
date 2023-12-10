<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    protected $fillable = ['followee_id', 'follower_id'];
    protected $table = 'follows';
}
