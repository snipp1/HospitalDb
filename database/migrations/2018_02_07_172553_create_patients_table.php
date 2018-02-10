<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folder_number')->unique()->nullable();
            $table->string('first_name');
            $table->string('other_name')->nullable();
            $table->string('last_name');
            $table->integer('gender');
            $table->date('dob')->nullable();
            $table->integer('nationality')->nullable();
            $table->integer('parity')->nullable();
            $table->string('address')->nullable();
            $table->string('occcupation')->nullable();
            $table->integer('marital_status')->nullable();
            $table->integer('religion')->nullable();
            $table->integer('educational_status')->nullable();
            $table->string('patient_phone_number')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->integer('ethnicity')->nullable();
            $table->integer('patient_group')->nullable();
            $table->string('next_of_king_name')->nullable();
            $table->integer('next_of_king_relationship')->nullable();
            $table->string('next_of_king_contact')->nullable();
            $table->string('referring_hospital_Clinic')->nullable();
            $table->integer('race')->nullable();
            $table->integer('facility_category')->nullable();
            $table->string('facility_status')->nullable();
            $table->string('emergency_referral')->nullable();
            $table->integer('gestational_age')->nullable();
            $table->integer('reason_for_referral')->nullable();
            $table->integer('clinical_visit')->nullable();
            $table->integer('type_of_patient')->nullable();
            $table->string('insurance_name')->nullable();
            $table->integer('insurance_number')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
