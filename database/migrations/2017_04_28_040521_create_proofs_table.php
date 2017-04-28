<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proofs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('enable');
            $table->integer('cat_id')->unsigned();
            $table->timestamps();

            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('cat_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proofs');
    }
}
