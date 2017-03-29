<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class liquidacion extends Model
{
    //
    protected $table= "liquidacion";
    protected $fillable =['contratista','fecha_inicio','fecha_fin','cantidad_servicio','cantidad_contado','cantidad_credito','porcentaje_contratista','porcentaje_contratante','porcentaje_retencion','total_servicios','total_contado','total_credito','monto_retencion','utilidad_contratista','utilidad_contratante','total_contratante','total_contratista','abono_prestamo','base','ahorro','alquiler','total_liquidacion', 'seguro', 'fecha'];
    protected $dates = ['deleted_at'];
}
