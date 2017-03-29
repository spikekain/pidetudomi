<?php

namespace mensajeria\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class tipo_servicios_request_create extends FormRequest
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
              'descripcion'=>'required|min:1|max:12',
              'color'=>'required'
        ];
    }
}
