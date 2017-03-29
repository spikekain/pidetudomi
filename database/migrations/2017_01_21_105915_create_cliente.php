<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->text('nit');
            $table->text('direccion');
            $table->text('telefono1');
            $table->text('telefono2');
            $table->text('email');
            $table->text('representante_legal');
            $table->text('logo');
            $table->text('fondo_pagina');
              $table->softDeletes();
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
