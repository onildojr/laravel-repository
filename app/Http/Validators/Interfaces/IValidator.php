<?php

namespace App\Http\Validators\Interfaces;

/**
 * Interface Validator
 * @package App\Http\Validators\Interfaces
 */
interface IValidator
{
    /**
     * @param array $data
     * @return array
     */
    public function isValid(array $data): ?array;

    /**
     * @return array
     */
    public function rules(): array;

    /**
     * @return array
     */
    public function messages(): array;
}
