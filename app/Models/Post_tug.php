<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_tug extends Model
{
    use HasFactory;
    
    #デフォルトでEloquentは、モデルと対応するデータベーステーブルに、
    #created_atカラムとupdated_atカラムが存在していると想定します。
    public $timestamps = false;
}
