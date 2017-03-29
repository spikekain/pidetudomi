<?php

namespace mensajeria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class servicios extends Model
{
    //
    use SoftDeletes;
   protected $table= "servicios";
   protected $fillable =['telefono_remitente','nombre_remitente','centro_costo_remitente','contacto_remitente', 'direccion_remitente','barrio_remitente','telefono_destinatario','nombre_destinatario','centro_costo_destinatario','nit_destinatario','direccion_destinatario','contacto_destinatario','barrio_destinatario','alto_paquete','largo_paquete','ancho_paquete','peso_paquete','valor_paquete', 'seguro_paquete', 'tipo_servicio', 'contratista', 'detalle_envio', 'valor_servicio', 'tipo_servicio', 'status', 'nit_remitente','cliente', 'forma_pago','utilidad','dia','fecha','impreso','fecha_espera','operario'];
   protected $dates = ['deleted_at'];




}
