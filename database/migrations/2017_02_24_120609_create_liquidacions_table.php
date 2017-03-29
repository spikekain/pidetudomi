<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiquidacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contratista');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('cantidad_servicio', 15, 2);
            $table->decimal('cantidad_contado', 15, 2);
            $table->decimal('porcentaje_contratista', 15, 2);
            $table->decimal('porcentaje_contratante', 15, 2);
            $table->decimal('porcentaje_retencion', 15, 2);
            $table->decimal('total_servicios', 15, 2);
            $table->decimal('total_contado', 15, 2);
            $table->decimal('total_credito', 15, 2);
            $table->decimal('monto_retencion', 15, 2);
            $table->decimal('utilidad_contratista', 15, 2);
            $table->decimal('utilidad_contratante', 15, 2);
            $table->decimal('total_contratante', 15, 2);
            $table->decimal('total_contratista', 15, 2);
            $table->decimal('abono_prestamo', 15, 2);
            $table->decimal('base', 15, 2);
            $table->decimal('ahorro', 15, 2);
            $table->decimal('alquiler', 15, 2);
            $table->decimal('total_liquidacion', 15, 2);
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
        Schema::dropIfExists('liquidacions');
    }
}
