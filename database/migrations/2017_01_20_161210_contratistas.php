<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contratistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('contratistas', function (Blueprint $table) {
          $table->increments('id');

          $table->text('nombre');
          $table->text('nit');
          $table->text('direccion');
          $table->text('telefono1');
          $table->text('telefono2');
          $table->text('email');


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
          Schema::dropIfExists('contratistas');
    }
}
