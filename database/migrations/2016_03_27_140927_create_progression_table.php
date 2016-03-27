<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progression', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tracker_id')->unsigned()->nullable();
            $table->string('tracker_type')->nullable();
            $table->longText('progress_matrix')->nullable(); 
            $table->text('tier1');
            $table->text('tier2');
            $table->text('tier3');
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
        Schema::drop('progression');
    }
}
