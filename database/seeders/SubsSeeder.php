<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Datetime;

class SubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subs')->insert([
            'user_id'=>1,
            'name'=>'samplesubuser',
            'profiletext'=>'sampletext',
            'seacret'=>0,
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
    }
}
