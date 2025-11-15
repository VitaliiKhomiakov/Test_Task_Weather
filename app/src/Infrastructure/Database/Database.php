<?php

declare(strict_types=1);

namespace Infrastructure\Database;

use Application\DTO\DatabaseConfigDTO;
use Exception;
use PDO;
use PDOException;
use RuntimeException;

class Database extends DatabaseConnection {

    private PDO $connect;
    private static ?Database $db = null;

    private array $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    private function __construct(DatabaseConfigDTO $options) {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            $options->host,
            $options->databaseName
        );

        try {
            $this->connect = new PDO(
                $dsn,
                $options->user,
                $options->pass,
                $this->options
            );
        } catch (PDOException $e) {
            throw new RuntimeException('Database connection failed.', 0, $e);
        }
    }

    public static function connect(DatabaseConfigDTO $options): Database {
        if (self::$db === null)
        {
            self::$db = new Database($options);
        }

        return self::$db;
    }

    public function getConnection(): PDO {
        return $this->connect;
    }

    private function __clone() {}

    /**
     * @throws Exception
     */
    public function __wakeup() {
        throw new Exception("Cannot unserialize a singleton.");
    }
}
