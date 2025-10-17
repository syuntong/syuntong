<?php

declare(strict_types=1);

namespace App\Database;

use PDO;
use PDOException;
use App\Config\Config;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            self::connect();
        }
        return self::$connection;
    }

    private static function connect(): void
    {
        $config = Config::getInstance();

        $host = $config->get('DB_HOST', 'localhost');
        $port = $config->get('DB_PORT', '3306');
        $dbName = $config->get('DB_NAME', '');
        $user = $config->get('DB_USER', 'root');
        $password = $config->get('DB_PASSWORD', '');
        $charset = $config->get('DB_CHARSET', 'utf8mb4');

        $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset={$charset}";

        try {
            self::$connection = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            throw new PDOException("Database connection failed: " . $e->getMessage());
        }
    }

    public static function disconnect(): void
    {
        self::$connection = null;
    }
}
