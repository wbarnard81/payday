<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('employee_type_id');
            $table->unsignedBigInteger('employer_type_id');
            $table->string('registered_name');
            $table->string('initials');
            $table->date('birth_date');
            $table->string('id_number');
            $table->string('passport');
            $table->unsignedBigInteger('id_type_id');
            $table->string('other_id');
            $table->unsignedBigInteger('passport_country_id');
            $table->string('employee_number');
            $table->unsignedBigInteger('employee_status_id');
            $table->string('it');
            $table->string('business_number');
            $table->string('number');
            $table->string('cellphone_number');
            $table->string('email');
            $table->string('unit_number');
            $table->string('complex');
            $table->string('street_number');
            $table->string('street');
            $table->string('suburb');
            $table->string('city');
            $table->unsignedBigInteger('country_id');
            $table->string('postal_code');
            $table->string('post_unit_number');
            $table->string('post_complex');
            $table->string('post_street_number');
            $table->string('post_street');
            $table->string('post_suburb');
            $table->string('post_city');
            $table->unsignedBigInteger('post_country_id');
            $table->string('post_postal_code');
            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('account_type_id');
            $table->unsignedBigInteger('account_relationship_id');
            $table->unsignedBigInteger('bank_name_id');
            $table->string('branch_number');
            $table->string('branch_name');
            $table->string('account_holder_name');
            $table->string('account_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
