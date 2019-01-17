<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trainingevaluationdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingevaluationdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proj_id');
            $table->integer('training_id');
            $table->integer('best');
            $table->integer('better');
            $table->integer('good');
            $table->integer('fair');
            $table->integer('needimp');
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
        Schema::dropIfExists('trainingevaluationdetails');
    }
}
