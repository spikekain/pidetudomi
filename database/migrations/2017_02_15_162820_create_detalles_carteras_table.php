<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesCarterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_cartera', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('cartera');
          $table->decimal('monto', 15, 2);
          $table->integer('tipo');
          $table->text('descripcion');
          $table->date('fecha');
          $table->text('referencia');
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
        Schema::dropIfExists('detalles_carteras');
    }
}
