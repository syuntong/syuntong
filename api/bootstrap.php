<?php

declare(strict_types=1);

// Load Composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Load configuration
use App\Config\Config;

$config = Config::getInstance();

// Set error reporting based on environment
$appEnv = $config->get('APP_ENV', 'production');
$appDebug = $config->get('APP_DEBUG', 'false') === 'true';

if ($appDebug) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// Set timezone
date_default_timezone_set('UTC');

// Set default headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
