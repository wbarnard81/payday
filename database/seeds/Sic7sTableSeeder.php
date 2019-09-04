<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sic7sTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sic7s')->insert([['code' => '01110', 'description' => 'Growing of cereals (except rice), leguminous crops and oil seeds']]);
        DB::table('sic7s')->insert([['code' => '01120', 'description' => 'Growing of rice']]);
        DB::table('sic7s')->insert([['code' => '01130', 'description' => 'Growing of vegetables and melons, roots and tubers']]);
    }
}
