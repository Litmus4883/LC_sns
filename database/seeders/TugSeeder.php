<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tugs')->insert([
            'name' => 'タグ１',
            'post_id' => 1,
        ]);
        
        DB::table('tugs')->insert([
            'name' => 'タグ２',
            'post_id' => 1,
        ]);
    }
}
