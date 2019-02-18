<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voornaam');
            $table->string('familienaam');
            $table->string('straat');
            $table->string('huisnummer');
            $table->string('bus')->nullable();
            $table->string('postcode');
            $table->string('gemeente');
            $table->string('telefoon')->nullable();
            $table->string('gsm')->nullable();
            $table->string('email');
            $table->string('wachtwoord');
            $table->date('geboortedatum');
            $table->string('RRN');
            $table->integer('mutualiteit_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('intake_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  // de user_id
            $table->foreign('mutualiteit_id')->references('id')->on('mutualities'); //
            $table->foreign('intake_id')->references('id')->on('intakes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
