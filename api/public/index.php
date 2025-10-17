<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

try {
    $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
    $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
    
    echo json_encode([
        'status' => 'success',
        'message' => 'API is running',
        'method' => $requestMethod,
        'uri' => $requestUri
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
