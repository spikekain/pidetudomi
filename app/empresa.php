<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    //

    protected $fillable =['nit','nombre','direccion','codigo','telefono1', 'telefono2','email','representante_legal','ciudad','precio_base', 'precio_km','minimo_km','ida_vuelta'];
}
