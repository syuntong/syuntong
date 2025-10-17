<?php

declare(strict_types=1);

namespace App\Util;

class Response
{
    public static function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public static function success(string $message, array $data = [], int $statusCode = 200): void
    {
        self::json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public static function error(string $message, int $statusCode = 400, array $errors = []): void
    {
        self::json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $statusCode);
    }

    public static function created(string $message, array $data = []): void
    {
        self::success($message, $data, 201);
    }

    public static function noContent(): void
    {
        http_response_code(204);
        exit;
    }

    public static function unauthorized(string $message = 'Unauthorized'): void
    {
        self::error($message, 401);
    }

    public static function forbidden(string $message = 'Forbidden'): void
    {
        self::error($message, 403);
    }

    public static function notFound(string $message = 'Resource not found'): void
    {
        self::error($message, 404);
    }

    public static function serverError(string $message = 'Internal server error'): void
    {
        self::error($message, 500);
    }
}
