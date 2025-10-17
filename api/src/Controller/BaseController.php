<?php

declare(strict_types=1);

namespace App\Controller;

abstract class BaseController
{
    protected function jsonResponse(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }

    protected function getRequestBody(): array
    {
        $body = file_get_contents('php://input');
        return json_decode($body, true) ?? [];
    }

    protected function getAuthToken(): ?string
    {
        $headers = getallheaders();
        $authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? null;
        
        if ($authHeader && preg_match('/Bearer\s+(.*)$/i', $authHeader, $matches)) {
            return $matches[1];
        }
        
        return null;
    }
}
