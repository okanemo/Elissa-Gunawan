<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLabStudies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_studies', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->unsigned();
            $table->string('code');
            $table->string('name');
            $table->string('value');
            $table->string('unit');
            $table->string('ref_range');
            $table->string('finding');
            $table->string('result_state');
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
        Schema::dropIfExists('lab_studies');
    }
}
