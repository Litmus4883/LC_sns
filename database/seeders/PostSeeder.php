<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'comment' => 'ポスト',
            #'image_url' => 'https://res.cloudinary.com/dt45mbmuw/image/upload/v1701836800/lernzkv99ip8cn5zfi96.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}