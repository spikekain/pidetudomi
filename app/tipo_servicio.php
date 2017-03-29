<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class tipo_servicio extends Model
{
    //
    use SoftDeletes;
   protected $table= "tipo_servicios";
   protected $fillable =['descripcion','color','costo_adicional'];
   protected $dates = ['deleted_at'];
}
