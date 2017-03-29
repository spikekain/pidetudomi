<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cartera extends Model
{
    //
  
    use SoftDeletes;
     protected $table= "cartera";
     protected $fillable =['cliente','fecha_inicio','fecha_fin','total_credito','porcentaje_retencion','total_deuda','saldo'];
     protected $dates = ['deleted_at'];
}
