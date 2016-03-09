<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('range')->unsigned();
            $table->longText('effects'); // Will store: target_stat, duration, target, modifier
            // duration: prefix r = rounds, ex: r5 = 5 rounds. b = battles. b5 = 5 battles. permanent = permanent
            // target: 0 = Self, 1 = Ally, 2 = AllyOrSelf, 3 = Enemy
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
        Schema::drop('abilities');
    }
}
