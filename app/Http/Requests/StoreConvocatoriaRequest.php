<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConvocatoriaRequest extends FormRequest
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
           /* 'titulo' => 'required|string|max:255',
            'archivo_pdf' => 'required|file|mimes:pdf|max:2048', // Validar que el archivo sea PDF y tenga un tamaño máximo de 2MB
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio', // Validar que la fecha de fin sea posterior o igual a la fecha de inicio
        // Añadir más reglas de validación según tus necesidades para otros campos del formulario
        */
        ];
    }
}
