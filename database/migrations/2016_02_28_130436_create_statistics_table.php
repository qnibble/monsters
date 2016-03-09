<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // For Primary Statistics only, not Derived Statistics
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned();
            $table->integer('strength_base')->unsigned();
            $table->integer('strength_mod')->unsigned();
            $table->integer('dexterity_base')->unsigned();
            $table->integer('dexterity_mod')->unsigned();
            $table->integer('constitution_base')->unsigned();
            $table->integer('constitution_mod')->unsigned();
            $table->integer('intellegence_base')->unsigned();
            $table->integer('intellegence_mod')->unsigned();
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
        Schema::drop('statistics');
    }
}
