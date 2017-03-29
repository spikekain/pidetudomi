<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //    $table->string('user', 100);
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user', 100);
            $table->string('pass', 100);
            $table->tinyInteger('tipo');
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
        Schema::drop('usuarios');
    }
}
