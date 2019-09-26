<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            ['employee_name' => 'John Smith', 'date' => '01/02/2011', 'employer_name' => 'CompName', 'description' => 'This is a description', 'irp5_code' => '3601', 'amount' => '200.00', 'note' => 'Employee Payment'],
            ['employee_name' => 'Employee', 'date' => '01/02/2011', 'employer_name' => 'CompName', 'description' => 'This is a description', 'irp5_code' => '3602', 'amount' => '200.00', 'note' => 'Employee Payment'],
            ['employee_name' => 'Employee', 'date' => '01/02/2011', 'employer_name' => 'CompName', 'description' => 'This is a description', 'irp5_code' => '3603', 'amount' => '200.00', 'note' => 'Employee Payment']
        ]);
    }
}
