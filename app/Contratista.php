<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Contratista extends Model
{
    //
     use SoftDeletes;
    protected $table= "contratistas";
    protected $fillable =['nit','nombre','direccion','telefono1', 'telefono2','email','codigo','descuento','porcentaje','sso','tipo_pago','soap','cdt','eps','placa','contrato','foto', 'utilidad', 'abono'];
    protected $dates = ['deleted_at'];
}
