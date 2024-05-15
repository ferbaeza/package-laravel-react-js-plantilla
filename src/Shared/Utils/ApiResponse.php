<?php

namespace Baezeta\App\Shared\Utils;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function json(string $message, array $data = [], int $status = null): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $status??ApiResponseCodes::$OK);
    }
}

class ApiResponseCodes
{
    public static int $OK = 200;
    public static int $CREATED = 201;
    public static int $NO_CONTENT = 204;
    public static int $BAD_REQUEST = 400;
    public static int $UNAUTHORIZED = 401;
    public static int $FORBIDDEN = 403;
    public static int $NOT_FOUND = 404;
    public static int $CONFLICT = 409;
    public static int $INTERNAL_SERVER_ERROR = 500;
}
