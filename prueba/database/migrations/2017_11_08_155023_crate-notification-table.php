<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbox', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_receptor')->unsigned();
            $table->integer('id_emisor')->unsigned();
            $table->text('tipo');
            $table->text('titulo');
            $table->date('fecha');
            $table->boolean('visto')->default(0);
            $table->integer('user_created')->unsigned();
            $table->integer('user_updated')->unsigned();

            $table->foreign('id_receptor')->references('id')->on('users');
            $table->foreign('id_emisor')->references('id')->on('users');
            $table->foreign('user_created')->references('id')->on('users');
            $table->foreign('user_updated')->references('id')->on('users');
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
        //
    }
}
