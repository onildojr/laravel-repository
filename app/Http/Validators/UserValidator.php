<?php

namespace App\Http\Validators;

use App\Helpers\Format;
use App\Http\Validators\Interfaces\IUserValidator;
use App\Services\Interfaces\IUserService;
use Illuminate\Support\Facades\Validator;

class UserValidator implements IUserValidator
{
    /**
     * BaseRepository constructor.
     */
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
            'birth' => 'required|date',
            'gender' => 'required|max:1|in:M,F',
            'username' => 'required|max:50|unique:App\Models\User,username',
            'password' => 'required|max:25|min:6'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é requerido.',
            'username.unique' => 'O username já está em uso',
            'name.max' => 'O campo name deve ter no máximo 150 caracteres.',
            'birth.date' => 'O campo birth deve ser uma data válida.',
            'gender.max' => 'O campo gender deve ter no máximo 1 caracter.',
            'gender.in' => 'O campo gender deve ser M ou F.',
            'username.max' => 'O campo username deve ter no máximo 50 caracteres.',
            'password.max' => 'O campo password deve ter no máximo 25 caracteres.',
            'password.min' => 'O campo password deve ter no mínimo 6 caracteres.'
        ];
    }
}
