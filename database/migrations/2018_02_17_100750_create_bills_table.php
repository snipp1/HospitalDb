<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patients_id');
            $table->string('patients_folder');
            $table->integer('biller_id');
            $table->double('bill_amount',16,2);
            $table->integer('bill_dep');
            $table->integer('bill_hospital');
            $table->boolean('is_paid')->nullable()->default(0);
            $table->double('paid_amount',16,2)->nullable()->default(0);
            $table->double('arrears',16,2)->nullable()->default(0);
            $table->dateTime('paid_date')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
