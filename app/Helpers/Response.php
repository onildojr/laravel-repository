<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class Response
{
    /**
     * Retorna uma resposta de sucesso (json)
     * @param $param
     * @return \Illuminate\Http\JsonResponse
     */
    public static function ok($param): JsonResponse
    {
        return response()->json($param, 200);
    }

    /**
     * Retorna uma resposta de objeto criado (json)
     * @param $param
     * @return \Illuminate\Http\JsonResponse
     */
    public static function created($param): JsonResponse
    {
        return response()->json($param, 201);
    }

    /**
     * Retorna uma resposta de erro de requisição (json)
     * @param $param
     * @return \Illuminate\Http\JsonResponse
     */
    public static function badRequest($param): JsonResponse
    {
        return response()->json($param, 400);
    }

    /**
     * Retorna uma resposta de erro interno de servidor (json)
     * @return \Illuminate\Http\JsonResponse
     */
    public static function internalServerError(): JsonResponse
    {
        return response()->json([
            "error" => 'internal_server_error',
            "message" => ["Ocorreu um erro interno no servidor."],
        ], 500);
    }
}
