<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function($table){
            $table->string('start_status')->nullable();
            $table->string('otp_status')->nullable();
        });

        Schema::table('trainings', function($table){
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function($table){
            $table->dropColumn('start_status');
            $table->dropColumn('otp_status');
        });

        Schema::table('trainings', function($table){
            $table->dropColumn('status');
        });
    }
}
