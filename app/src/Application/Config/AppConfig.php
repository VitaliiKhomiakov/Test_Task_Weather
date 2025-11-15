<?php

declare(strict_types=1);

namespace Application\Config;

final class AppConfig
{
    public const string BASE_URL = '/';
    public const bool DEBUG = false;

    private const string DEFAULT_DB_USER = 'weather';
    private const string DEFAULT_DB_PASSWORD = 'weather';
    private const string DEFAULT_DB_NAME = 'city';
    private const string DEFAULT_DB_HOST = 'db';

    public static function getDbUser(): string
    {
        return self::getEnv('DB_USER', self::DEFAULT_DB_USER);
    }

    public static function getDbPassword(): string
    {
        return self::getEnv('DB_PASSWORD', self::DEFAULT_DB_PASSWORD);
    }

    public static function getDbName(): string
    {
        return self::getEnv('DB_NAME', self::DEFAULT_DB_NAME);
    }

    public static function getDbHost(): string
    {
        return self::getEnv('DB_HOST', self::DEFAULT_DB_HOST);
    }

    private static function getEnv(string $key, string $default): string
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);

        if ($value === false || $value === null || $value === '') {
            return $default;
        }

        return (string) $value;
    }

    private function __construct() {}
}
