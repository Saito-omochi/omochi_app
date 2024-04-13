<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Datetime;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name' => 'ゲーム']);
        DB::table('categories')->insert(['name' => 'アニメ']);
        DB::table('categories')->insert(['name' => '日常']);
        DB::table('categories')->insert(['name' => 'TRPG']);
        DB::table('categories')->insert(['name'=>'その他']);
    }
}
