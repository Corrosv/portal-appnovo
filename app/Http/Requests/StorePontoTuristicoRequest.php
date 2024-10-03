<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePontoTuristicoRequest extends FormRequest
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
            'nome'  => 'required|string|max:255|unique:ponto_turistico,nome',
            'contato' => 'required|string|max:255',
            'longitude_latidude' => 'required|string|max:255',
            'como_chegar' => 'required|string|max:255',
            'imagem' => 'required|string|max:255',
            'id_endereco' => 'required|exists:endereco,id',
            'id_tipo_ponto_turistico' => 'required|exists:pontoturistico,id'
        ];
    }
}
