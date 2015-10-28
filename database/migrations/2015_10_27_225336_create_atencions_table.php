<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtencionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_id')->references('id')->on('listas');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('colaborador_id')->unsigned()->nullable();
            $table->foreign('colaborador_id')->references('id')->on('users');
            $table->integer('estado_id')->unsigned()->nullable();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->bigInteger('posicion')->nullable();
            $table->string('numero')->nullable();
            $table->string('codigo')->nullable();
            $table->string('modo');
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
        Schema::drop('atencions');
    }
}
