<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_of_test')->nullable();
            $table->string('id_number');
            $table->string('patient_name');
            $table->string('phone_mobile')->nullable();
            $table->string('gender');
            $table->timestamp('date_of_birth')->nullable();
            $table->string('lab_number');
            $table->string('clinic_code');
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
        Schema::dropIfExists('patient');
    }
}
