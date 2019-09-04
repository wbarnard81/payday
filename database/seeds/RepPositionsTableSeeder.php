<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rep_positions')->insert(['name' => 'Public Officer']);
        DB::table('rep_positions')->insert(['name' => 'Trustee']);
        DB::table('rep_positions')->insert(['name' => 'Partnership']);
        DB::table('rep_positions')->insert(['name' => 'Tresurer']);
        DB::table('rep_positions')->insert(['name' => 'Accounting Officer']);
    }
}
