<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->insert(['name' => 'Cash']);
        DB::table('account_types')->insert(['name' => 'Cheque']);
        DB::table('account_types')->insert(['name' => 'Savings']);
    }
}
