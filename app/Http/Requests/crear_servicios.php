<?php

namespace mensajeria\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crear_servicios extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'forma_pago'=>'required|numeric',
            'telefono_remitente'=> 'required',
            'direccion_destinatario'=>'required',
            'nombre_remitente'=>'required',
            'tipo_servicio'='required|min:1'

        ];
    }
}
