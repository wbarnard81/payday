<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([['code' => 'AUS', 'name' => 'Australia']]);
        DB::table('countries')->insert([['code' => 'ALIT', 'name' => 'Austria']]);
        DB::table('countries')->insert([['code' => 'AZE', 'name' => 'Azerbaijan']]);
    }
}
