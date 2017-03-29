<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    //
    protected $table = "usuarios";
    $table->string('user', 100);
    $table->string('pass', 100);
    $table->tinyInteger('tipo');
}
