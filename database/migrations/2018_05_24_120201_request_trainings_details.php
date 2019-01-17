<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestTrainingsDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_trainings_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('req_id');
            $table->integer('training_id');
            $table->string('status');
            $table->string('typeofrequesters');
            $table->integer('approved_by');
            $table->date('fdate');
            $table->date('tdate');
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
        Schema::dropIfExists('request_trainings_details');
    }
}
