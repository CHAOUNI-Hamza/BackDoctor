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
$table->string('email')->unique();
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
$table->json('service');
        $table->json('specialization');
        $table->string('education');
        $table->string('experience');
        $table->string('awords');
        $table->string('memberships');
        $table->string('registrations');
$table->softDeletes();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
