<?php

namespace App\Helpers;

class Format
{
    /**
     * Formata uma mensagem de erro de validação de dados
     * @param string $campo
     * @param string $message
     * @return array
     */
    public static function validationError(string $campo, string $message): array
    {
        $error = [$campo => $message];
        return [
            "error" => 'validation_error',
            "message" => $error
        ];
    }

    /**
     * Formata o messagebag como array
     * @param string $errors
     * @return array
     */
    public static function messageBag($errors): array
    {
        return [
            "error" => 'validation_error',
            "message" => $errors
        ];
    }
}
