<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;

class reporte_empresa extends Model
{
    //
     protected $table= "reporte_empresas";
    protected $fillable =['empresa','reporte1','reporte2','reporte3','reporte4'];
}
