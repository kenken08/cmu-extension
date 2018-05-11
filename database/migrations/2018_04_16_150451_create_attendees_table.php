<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('sex');
            $table->integer('age');
            $table->string('ethnicorigin');
            $table->string('hea');
            $table->string('religion');
            $table->string('civilstatus');
            $table->integer('noofchild');
            $table->string('occupation');
            $table->string('address');
            $table->string('cellno');
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
        Schema::dropIfExists('attendees');
    }
}
