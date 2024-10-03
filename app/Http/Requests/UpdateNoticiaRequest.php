<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoticiaRequest extends FormRequest
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
            'data' => 'required|date',
               'titulo' => 'required|string|max:255',
              'texto' => 'required|string|max:255',
              'id_autor' => 'required|string',
               'subtitulo' => 'required|exists:autores,id',
               'id_caderno' => 'required|exists:caderno,id',
        ];
    }
}
