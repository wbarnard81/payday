<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_types')->insert(['name' => 'Inevid ID']);
        DB::table('employee_types')->insert(['name' => 'Individ No ID']);
        DB::table('employee_types')->insert(['name' => 'Director']);
    }
}
