<?php

namespace App\Http\Validators;

use App\Helpers\Format;
use App\Http\Validators\Interfaces\IAlbumValidator;
use App\Services\Interfaces\IArtistService;
use Illuminate\Support\Facades\Validator;

class AlbumValidator implements IAlbumValidator
{
    private $_artistService;

    public function __construct(IArtistService $artistService)
    {
        $this->_artistService = $artistService;
    }

    /**
     * @param array $data
     * @return array
     */
    public function isValid(array $data): ?array
    {
        $validator =  Validator::make($data, $this->rules(), $this->messages());

        if ($validator->fails()) {
            return Format::messageBag($validator->errors());
        }

        return null;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:150',
            'release_year' => 'required|integer|min:1900|max:2025',
            'artist_id' => 'required|integer|exists:App\Models\Artist,id',
        ];
    }

    /**
     * @return array
     */
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
