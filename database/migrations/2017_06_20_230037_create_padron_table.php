<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadronTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padron', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_card');
            $table->string('name');
            $table->string('lastname');
            $table->string('gender');
            $table->string('address');
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
        Schema::drop('padron');
    }
}
