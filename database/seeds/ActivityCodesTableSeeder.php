<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_codes')->insert([['code' => '01', 'description' => 'AGRICULTURE, FORESTRY AND FISHING']]);
        DB::table('activity_codes')->insert([['code' => '02', 'description' => 'MINING AND QUARRYING']]);
        DB::table('activity_codes')->insert([['code' => '03', 'description' => 'FOOD, DRINK AND TOBACCO']]);
    }
}
