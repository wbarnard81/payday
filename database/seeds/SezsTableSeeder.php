<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SezsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sezs')->insert([['code' => 'COE', 'description' => 'COEGA']]);
        DB::table('sezs')->insert([['code' => 'DTP', 'description' => 'DUBE TRADE PORT']]);
        DB::table('sezs')->insert([['code' => 'EAL', 'description' => 'EAST LONDON']]);
        DB::table('sezs')->insert([['code' => 'MAP', 'description' => 'MALUTI-A-PHOFUNG SEZ']]);
        DB::table('sezs')->insert([['code' => 'SLB', 'description' => 'SALDANHA BAY ']]);
        DB::table('sezs')->insert([['code' => 'RIB', 'description' => 'RICHARDS BAY']]);
    }
}
