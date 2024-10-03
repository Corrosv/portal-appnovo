<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNegocioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nome_fantasia' => 'required|string|max:255',
            
            'descricao' =>  'required|text',
            
            'contato'  =>  'required|string|max:255',
            
            'latitude_longitude' => 'required|string|max:255',
            
            'ativo' => 'required|boolean',
            
            'id_tipo_negocio' => ' required|exists:tipo_negocio,id',
           
            'id_endereco' => 'required|exists:endereco,id'

        ];
    }
}
