<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionGrupalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptionGrupal', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('sport')->unsigned();
            $table->integer('category')->unsigned();
            $table->integer('proof')->unsigned();
            $table->string('inscription');
            $table->integer('edition');
            $table->integer('stade');
            $table->timestamps();

            $table->foreign('sport')->references('id')->on('sports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('proof')->references('id')->on('challenges')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscriptionGrupal');
    }
}
