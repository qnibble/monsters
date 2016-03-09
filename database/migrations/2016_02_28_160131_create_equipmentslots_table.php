<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipmentslots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned();
            $table->integer('head_id')->unsigned()->nullable();
            $table->integer('body_id')->unsigned()->nullable();
            $table->integer('hands_id')->unsigned()->nullable();
            $table->integer('feet_id')->unsigned()->nullable();
            $table->integer('weapon_id')->unsigned()->nullable();
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
        Schema::drop('equipmentslots');
    }
}
