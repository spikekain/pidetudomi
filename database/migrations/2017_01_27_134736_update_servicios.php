<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('servicios', function (Blueprint $table) {

            $table->text('telefono_remitente');
            $table->text('nombre_remitente');
            $table->text('contro_costo_remitente');
            $table->text('nit_remitente');
            $table->text('contacto_remitente');
            $table->text('direccion_remitente');
            $table->text('barrio_remitente');
            $table->text('telefono_destinatario');
            $table->text('nombre_destinatario');
            $table->text('centro_costo_destinatario');
            $table->text('nit_destinatario');
            $table->text('direccion_destinatario');
            $table->text('contacto_destinatario');
            $table->text('barrio_destinatario');
            $table->text('tipo_envio');
            $table->text('paquete_ancho');
            $table->text('paquete_alto');
            $table->text('paquete_largo');
            $table->text('paquete_peso');
            $table->text('paquete_seguro');
            $table->text('detalle_envio');
            $table->text('valor_servicio');

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
