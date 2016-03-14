<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapdata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('number_cols')->unsigned();
            $table->integer('number_rows')->unsigned();
            $table->longText('enemy_data'); // JSON of Enemies (by Character ID, Map location)
            $table->longText('ally_data'); // JSON of Allies (by Character ID, Map location)
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
        Schema::drop('mapdata');
    }
}
