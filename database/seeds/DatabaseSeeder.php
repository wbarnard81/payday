<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountRelationshipsTableSeeder::class);
        $this->call(AccountTypesTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(ActivityCodesTableSeeder::class);
        $this->call(BanknamesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(EmployeeTypesTableSeeder::class);
        $this->call(EmployerTypesTableSeeder::class);
        $this->call(FrequinciesTableSeeder::class);
        $this->call(Irp5CodesTableSeeder::class);
        $this->call(OtherIdtypesTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(RepPositionsTableSeeder::class);
        $this->call(SezsTableSeeder::class);
        $this->call(Sic7sTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
    }
}
