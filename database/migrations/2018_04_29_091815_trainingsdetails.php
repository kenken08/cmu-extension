<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trainingsdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('trainingsdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('attendee_id');
            $table->integer('training_id');
            $table->integer('status');
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
        Schema::dropIfExists('trainingsdetails');
    }
}
