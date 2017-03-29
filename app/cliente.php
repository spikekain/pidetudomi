<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class cliente extends Model
{
    //
    use SoftDeletes;
   protected $table= "clientes";
   protected $fillable =['nit','nombre','direccion','telefono1', 'telefono2','email','ciudad','representante_legal', 'logo', 'fondo_pagina', 'barrio', 'contacto', 'coordenadas'];
   protected $dates = ['deleted_at'];



}
