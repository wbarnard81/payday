<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Irp5CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('irp5_codes')->insert([['code' => '3601', 'description' => 'Income (PAYE)']]);
        DB::table('irp5_codes')->insert([['code' => '3602', 'description' => 'Non-Taxable Income (Excl)']]);
        DB::table('irp5_codes')->insert([['code' => '3603', 'description' => 'Pension (PAYE)']]);
    }
}
