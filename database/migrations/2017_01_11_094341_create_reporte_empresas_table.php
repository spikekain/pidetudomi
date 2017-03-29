<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresa');
            $table->longText('reporte1');
            $table->longText('reporte2');
            $table->longText('reporte3');
            $table->longText('reporte4');
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
        Schema::dropIfExists('reporte_empresas');
    }
}
