<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('soort',['hotel','dagverblijf','therapie']);
            $table->integer('user_id')->unsigned()->nullable();
            $table->enum('status',['aangevraagd', 'actief', 'voorbij']);  
            $table->boolean('tewissen')->default(false);          
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
                       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
