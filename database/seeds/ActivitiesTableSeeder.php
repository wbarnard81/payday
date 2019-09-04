<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([['profit_code' => '102', 'loss_code' => '103', 'description' => 'Pig farming']]);
        DB::table('activities')->insert([['profit_code' => '104', 'loss_code' => '105', 'description' => 'Livestock farming']]);
        DB::table('activities')->insert([['profit_code' => '106', 'loss_code' => '107', 'description' => 'Crop farming']]);
    }
}
