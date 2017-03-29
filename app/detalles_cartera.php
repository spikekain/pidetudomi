<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalles_cartera extends Model
{
    //
    use SoftDeletes;
     protected $table= "detalles_cartera";
     protected $fillable =['cartera','monto','tipo','descripcion','referencia'];
     protected $dates = ['deleted_at'];
}
