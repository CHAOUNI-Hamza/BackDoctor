<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('username');
$table->string('specialite');
$table->dateTime('membre_since');
$table->string('status');
$table->string('photo');
$table->string('sex');
$table->date('date');
$table->string('email');
$table->string('firstname');
$table->string('lastname');
$table->string('password');
$table->string('phone');
$table->string('clinicname');
$table->string('clinicadresse');
$table->string('clinicimage');
$table->string('adresse_one');
$table->string('adresse_two');
$table->string('city');
$table->string('state');
$table->string('country');
$table->string('code_postal');
$table->string('pricing');
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
        Schema::dropIfExists('doctors');
    }
}