<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptionPeople', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_inscription')->unsigned();
            $table->integer('id_person')->unsigned();
            $table->string('pase_cantonal');
            $table->timestamps();

            $table->foreign('id_inscription')->references('id')->on('inscriptionGrupal')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_person')->references('id')->on('inscriptionPeople')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('inscriptionPeople');
    }
}
