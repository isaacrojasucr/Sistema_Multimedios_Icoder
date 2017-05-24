<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('gender');
            $table->integer('id_card');
            $table->string('mail');
            $table->string('phone');
            $table->double('height');
            $table->double('width');
            $table->integer('blood');
            $table->string('country');
            $table->date('birthday');
            $table->integer('town')->unsigned();
            $table->string('address');
            $table->integer('role');
            $table->string('image');
            $table->string('id_card_front');
            $table->string('id_card_back');
            $table->string('city');
            $table->string('province');
            $table->timestamps();

            $table->foreign('town')->references('id')->on('towns')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('people');
    }
}
