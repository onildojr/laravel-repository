<?php

namespace App\Http\Validators;

use App\Helpers\Format;
use App\Http\Validators\Interfaces\ITrackValidator;
use App\Services\Interfaces\IAlbumService;
use Illuminate\Support\Facades\Validator;

class TrackValidator implements ITrackValidator
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
            'name' => 'required|max:150',
            //'duration' => 'required|min:1|integer',
            //'album_id' => 'required|exists:App\Models\Album,id',
            'order' => 'min:1'
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
            'duration.min' => 'O campo duration deve ser maior que 0.',
            'order.min' => 'O campo order deve ser maior que 0.'
        ];
    }
}
