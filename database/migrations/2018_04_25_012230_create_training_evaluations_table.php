<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resourceevaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proj_id');
            $table->integer('training_id');
            $table->integer('indicator_id');
            $table->string('indicator_eval');
            $table->date('date-eval');
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
        Schema::dropIfExists('resourceevaluations');
    }
}
