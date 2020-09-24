<?php

use \Illuminate\Http\JsonResponse;

if (!function_exists('Ok')) {
    /**
     * Retorna uma resposta de sucesso (json)
     * @param $param
     * @return \Illuminate\Http\JsonResponse
     */
    function Ok($param): JsonResponse
    {
        return response()->json($param, 200);
    }
}

if (!function_exists('Created')) {
    /**
     * Retorna uma resposta de objeto criado (json)
     * @param $param
     * @return \Illuminate\Http\JsonResponse
     */
    function Created($param): JsonResponse
    {
        return response()->json($param, 201);
    }
}

if (!function_exists('BadRequest')) {
    /**
     * Retorna uma resposta de erro de requisição (json)
     * @param $param
     * @return \Illuminate\Http\JsonResponse
     */
    function BadRequest($param): JsonResponse
    {
        return response()->json($param, 400);
    }
}

if (!function_exists('InternalServerError')) {
    /**
     * Retorna uma resposta de erro interno de servidor (json)
     * @return \Illuminate\Http\JsonResponse
     */
    function InternalServerError(): JsonResponse
    {
        return response()->json([
            "error" => 'internal_server_error',
            "message" => ["Ocorreu um erro interno no servidor."],
        ], 500);
    }
}

if (!function_exists('FormatValidationError')) {
    /**
     * Formata uma mensagem de erro de validação de dados
     * @param string $campo
     * @param string $message
     * @return array
     */
    function FormatValidationError(string $campo, string $message): array
    {
        $error = [$campo => $message];
        return [
            "error" => 'validation_error',
            "message" => $error
        ];
    }
}
