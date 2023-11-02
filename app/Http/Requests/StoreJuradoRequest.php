<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJuradoRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'turno' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'numeroMesa' => 'required|string|max:255',
            'observacion' => 'nullable|string|max:255',
        ];
    }
}
