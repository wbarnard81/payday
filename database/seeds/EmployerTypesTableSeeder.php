<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employer_types')->insert(['name' => 'Individual']);
        DB::table('employer_types')->insert(['name' => 'Partnership']);
        DB::table('employer_types')->insert(['name' => 'Company']);
    }
}
