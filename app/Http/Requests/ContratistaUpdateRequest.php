<?php

namespace mensajeria\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratistaUpdateRequest extends FormRequest
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
            'nombre'=>'required',
            'nit'=>'required|unique:contratistas',
            'direccion'=>'required',
            'codigo'=>'required|unique:contratistas',
              'telefono1'=>'required',
              'descuento'=>'numeric',
              'abono'=>'numeric',
              'alquiler'=>'numeric',
              'porcentaje'=>'numeric'
        ];
    }
}
