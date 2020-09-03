<?php

namespace App\Http\Validators\Interfaces;

/**
* Interface UserValidator
* @package App\Repositories
*/
interface IUserValidator
{
    /**
     * @param array $data
     * @return array
    */
    public function isValid(array $data) : ?array;

    /**
     * @return array
     */
    public function rules() : array;

    /**
     * @return array
     */
    public function messages() : array;
}
