<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert(['name' => 'EFT']);
        DB::table('payment_methods')->insert(['name' => 'Cheque']);
        DB::table('payment_methods')->insert(['name' => 'Savings']);
        DB::table('payment_methods')->insert(['name' => 'Cash']);
    }
}
