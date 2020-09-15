<?php

namespace App\Http\Validators;

use App\Helpers\Format;
use App\Http\Validators\Interfaces\IAlbumValidator;
use Illuminate\Support\Facades\Validator;

class AlbumValidator implements IAlbumValidator
{
    public function __construct()
    {
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
            'name' => 'required|max:150'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é requerido.',
            'name.max' => 'O campo name deve ter no máximo 150 caracteres.'
        ];
    }
}
