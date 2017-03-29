<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class notas_contables extends Model
{
  protected $table= "notas_contables";
  protected $fillable =['proveedor','nit','descripcion','fecha','monto', 'responsable','tipo'];
    protected $dates = ['deleted_at'];
}
