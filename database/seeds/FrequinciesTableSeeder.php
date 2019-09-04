<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequinciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frequincies')->insert(['name' => 'Dayly']);
        DB::table('frequincies')->insert(['name' => 'Weekly']);
        DB::table('frequincies')->insert(['name' => 'Fortnight']);
        DB::table('frequincies')->insert(['name' => 'Monthly']);
    }
}
