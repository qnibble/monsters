<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivebattleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activebattle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned();
            $table->integer('last_x')->unsigned(); 
            $table->integer('last_y')->unsigned(); 
            $table->integer('turn_number')->unsigned(); // There has to be a better way to do this 
            $table->integer('current_hp');
            $table->boolean('has_moved'); // having this now necessitates advancing the turn server-side
            // Add active effects JSON  
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
        Schema::drop('activebattle');
    }
}
