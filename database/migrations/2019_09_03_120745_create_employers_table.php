<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('employer_type_id');
            $table->string('company_name');
            $table->string('trading_name');
            $table->string('registered_name');
            $table->string('initials');
            $table->date('birth_date');
            $table->string('id_number');
            $table->string('passport');
            $table->unsignedBigInteger('employer_passport_country_id');
            $table->string('it');
            $table->string('paye');
            $table->string('sdl');
            $table->string('uif');
            $table->string('coida');
            $table->string('vat');
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('sic7_id');
            $table->unsignedBigInteger('sez_id');
            $table->string('business_number');
            $table->string('business_cellphone');
            $table->string('business_email');
            $table->string('unit');
            $table->string('complex');
            $table->string('street_number');
            $table->string('street');
            $table->string('suburb');
            $table->string('city');
            $table->string('postal_code');
            $table->unsignedBigInteger('employer_country_id');
            $table->string('post_unit');
            $table->string('post_complex');
            $table->string('post_street_number');
            $table->string('post_street');
            $table->string('post_suburb');
            $table->string('post_city');
            $table->string('post_postal_code');
            $table->unsignedBigInteger('post_country_id');
            $table->string('telephone_number');
            $table->unsignedBigInteger('account_type_id');
            $table->unsignedBigInteger('account_relationship_id');
            $table->unsignedBigInteger('bank_name_id');
            $table->string('branch_number');
            $table->string('branch_name');
            $table->string('account_holder_name');
            $table->string('account_number');
            $table->string('rep_cap');
            $table->string('rep_name');
            $table->string('rep_surname');
            $table->string('rep_id');
            $table->string('rep_passport');
            $table->unsignedBigInteger('rep_passport_country_id');
            $table->string('rep_number');
            $table->string('rep_cellphone');
            $table->string('rep_email');
            $table->unsignedBigInteger('rep_position_id');
            $table->string('rep_initials');
            $table->string('cont_name');
            $table->string('cont_surname');
            $table->string('cont_initials');
            $table->string('cont_id');
            $table->string('cont_passport');
            $table->unsignedBigInteger('cont_passport_country_id');
            $table->string('cont_number');
            $table->string('cont_cellphone');
            $table->string('cont_email');
            $table->unsignedBigInteger('cont_position_id');
            $table->string('tp_surname');
            $table->string('tp_initials');
            $table->string('tp_id');
            $table->string('tp_number');
            $table->string('tp_cellphone');
            $table->string('tp_email');
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
        Schema::dropIfExists('employers');
    }
}
