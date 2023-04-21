<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_patient', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('doctor_id');
    $table->unsignedBigInteger('patient_id');

    $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
    $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
    $table->softDeletes();

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
        Schema::dropIfExists('doctor_patient');
    }
}
