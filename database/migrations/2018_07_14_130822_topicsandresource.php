<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Topicsandresource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topicsandresource', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('train_id');
            $table->string('resource_name');
            $table->string('topic');
            $table->integer('evaluated');
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
        Schema::dropIfExists('topicsandresource');
    }
}
