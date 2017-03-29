<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_contables', function (Blueprint $table) {
            $table->increments('id');
            $table->text('proveedor');
            $table->text('nit');
            $table->text('descripcion');
            $table->text('referencia');
            $table->text('responsable');
            $table->date('fecha');
            $table->integer('tipo');
            $table->decimal('monto', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas_contables');
    }
}
