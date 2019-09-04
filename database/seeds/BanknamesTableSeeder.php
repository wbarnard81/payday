<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanknamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banknames')->insert(['name' => 'ABSA']);
        DB::table('banknames')->insert(['name' => 'Nedbank']);
        DB::table('banknames')->insert(['name' => 'SBSA']);
        DB::table('banknames')->insert(['name' => 'FNB']);
    }
}
