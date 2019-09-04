<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountRelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_relationships')->insert(['name' => 'Own']);
        DB::table('account_relationships')->insert(['name' => 'Joint']);
        DB::table('account_relationships')->insert(['name' => 'Third Party']);
    }
}
