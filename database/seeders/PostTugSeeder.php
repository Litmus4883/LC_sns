<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_tug')->insert([
            'post_id' => 1,
            'tug_id' => 1,
        ]);
        
        DB::table('post_tug')->insert([
            'post_id' => 1,
            'tug_id' => 2,
        ]);
    }
}
