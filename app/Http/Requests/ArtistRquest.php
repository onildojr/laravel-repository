<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:150',
            'test.name' => 'required|max:150'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é requerido.',
            'exists' => 'O campo :attribute não é um id válido',
            'name.max' => 'O campo name deve ter no máximo 150 caracteres.',
            'release_year.min' => 'O campo release_year deve ser maior que 1900.',
            'release_year.max' => 'O campo release_year deve ser menor que 2025.'
        ];
    }
}
