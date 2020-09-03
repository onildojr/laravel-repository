<?php

namespace App\Http\Validators;

use App\Http\Validators\Interfaces\IUserValidator;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\IUserRepository;

class UserValidator implements IUserValidator
{
    private $_userRepository;

    /**
     * BaseRepository constructor.
     */
    public function __construct(IUserRepository $userRepository)
    {
        $this->_userRepository = $userRepository;
    }

    /**
    * @param array $data
    * @return array
    */
    public function isValid(array $data) : ?array
    {
        $validator =  Validator::make($data, $this->rules(), $this->messages());

        if ($validator->fails()) {
            return FormatMessageBag($validator->errors());
        }

        if ($data["gender"] !== "F" && $data["gender"] !== "M") {
            return FormatValidationError(
                "gender",
                "O campo gender deve ser M ou F."
            );
        }

        if ($this->_userRepository->findByUserName($data["username"])) {
            return FormatValidationError(
                "username",
                "O username já está em uso."
            );
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
            'gender' => 'required|max:1',
            'username' => 'required|max:50',
            'password' => 'required|max:25|min:6'
        ];
    }

    /**
    * @return array
    */
    public function messages() : array
    {
        return [
            'required'=> 'O campo :attribute é requerido.',
            'name.max'=> 'O campo name deve ter no máximo 150 caracteres.',
            'birth.date'=> 'O campo birth deve ser uma data válida.',
            'gender.max'=> 'O campo gender deve ter no máximo 1 caracter.',
            'username.max' => 'O campo username deve ter no máximo 50 caracteres.',
            'password.max' => 'O campo password deve ter no máximo 25 caracteres.',
            'password.min' => 'O campo password deve ter no mínimo 6 caracteres.'
        ];
    }
}
