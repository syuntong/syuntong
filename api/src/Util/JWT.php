<?php

declare(strict_types=1);

namespace App\Util;

use Firebase\JWT\JWT as FirebaseJWT;
use Firebase\JWT\Key;
use App\Config\Config;
use Exception;

class JWT
{
    private static function getSecret(): string
    {
        $config = Config::getInstance();
        return $config->get('JWT_SECRET', 'default-secret-change-this');
    }

    private static function getAlgorithm(): string
    {
        $config = Config::getInstance();
        return $config->get('JWT_ALGORITHM', 'HS256');
    }

    private static function getExpiration(): int
    {
        $config = Config::getInstance();
        return (int) $config->get('JWT_EXPIRATION', 3600);
    }

    public static function encode(array $payload): string
    {
        $issuedAt = time();
        $expiration = $issuedAt + self::getExpiration();

        $token = array_merge($payload, [
            'iat' => $issuedAt,
            'exp' => $expiration,
        ]);

        return FirebaseJWT::encode($token, self::getSecret(), self::getAlgorithm());
    }

    public static function decode(string $token): ?array
    {
        try {
            $decoded = FirebaseJWT::decode($token, new Key(self::getSecret(), self::getAlgorithm()));
            return (array) $decoded;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function verify(string $token): bool
    {
        return self::decode($token) !== null;
    }
}
