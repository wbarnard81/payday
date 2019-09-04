<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtherIdtypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('other_idtypes')->insert(['name' => 'CIPC Number']);
        DB::table('other_idtypes')->insert(['name' => 'Trust Number']);
        DB::table('other_idtypes')->insert(['name' => 'Asylum Permit Number']);
    }
}
