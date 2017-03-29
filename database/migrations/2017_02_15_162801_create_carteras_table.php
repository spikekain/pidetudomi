<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarterasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartera', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cliente');
            $table->date('fecha_creacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('total_credito', 15, 2);
            $table->decimal('porcentaje_retencion', 15, 2);
            $table->decimal('total_deuda', 15, 2);
            $table->decimal('saldo', 15, 2);
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
        Schema::dropIfExists('cartera');
    }
}
