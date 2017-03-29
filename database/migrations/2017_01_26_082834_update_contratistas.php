<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContratistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('contratistas', function (Blueprint $table) {
            //
            $table->text('codigo');
            $table->text('contrato');
            $table->text('foto');
            $table->text('descuento');
            $table->text('utilidad');
            $table->text('sso');
            $table->text('tipo_pago');
            $table->timestamp('soap');
            $table->timestamp('cdt');
            $table->text('eps');
            $table->text('placa');
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
