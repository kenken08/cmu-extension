<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingsevaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('eval_id');
            $table->integer('training_id');
            $table->date('dateoftraining');
            $table->string('venue');
            $table->integer('aspect_id');
            $table->integer('aspect_eval');
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
        Schema::dropIfExists('trainingsevaluations');
    }
}
