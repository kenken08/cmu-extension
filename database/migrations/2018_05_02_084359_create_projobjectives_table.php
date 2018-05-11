<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjobjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projobjectives', function (Blueprint $table){
            $table->increments('id');
            $table->integer('proj_id');
            $table->string('objective');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('projobjectivesdetails', function (Blueprint $table){
            $table->increments('id');
            $table->integer('proj_id');
            $table->integer('objective_id');
            $table->float('total');
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
        Schema::dropIfExists('projobjectives');
        Schema::dropIfExists('projobjectivesdetails');        
    }
}
