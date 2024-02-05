<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = DB::table('users')->select('id')->first()->id;
        
        DB::table('posts')->insert([
            'comment' => 'ポスト',
            'image_id' => 1,
            'user_id' => $userId,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}