<?php

declare(strict_types=1);

namespace App\Controller;

class ApiController extends BaseController
{
    public function healthCheck(): void
    {
        $this->jsonResponse([
            'status' => 'success',
            'message' => 'API is healthy',
            'timestamp' => time(),
        ]);
    }

    public function notFound(): void
    {
        $this->jsonResponse([
            'status' => 'error',
            'message' => 'Endpoint not found',
        ], 404);
    }
}
