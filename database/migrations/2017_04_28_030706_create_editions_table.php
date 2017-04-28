<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('enable');
            $table->integer('year');
            $table->string('place');
            $table->date('initial_date');
            $table->date('final_date');
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
        Schema::drop('editions');
    }
}
