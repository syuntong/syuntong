<?php

declare(strict_types=1);

namespace App\Config;

class Config
{
    private static ?self $instance = null;
    private array $config = [];

    private function __construct()
    {
        $this->loadEnvironment();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function loadEnvironment(): void
    {
        $envFile = __DIR__ . '/../../.env';
        
        if (!file_exists($envFile)) {
            return;
        }

        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                if (!array_key_exists($key, $_ENV) && !array_key_exists($key, $_SERVER)) {
                    putenv("{$key}={$value}");
                    $_ENV[$key] = $value;
                    $_SERVER[$key] = $value;
                }
                
                $this->config[$key] = $value;
            }
        }
    }

    public function get(string $key, $default = null)
    {
        return $this->config[$key] ?? getenv($key) ?: $default;
    }

    public function has(string $key): bool
    {
        return isset($this->config[$key]) || getenv($key) !== false;
    }

    public function all(): array
    {
        return $this->config;
    }
}
