<?php
declare(strict_types=1);

namespace Infrastructure\Database;

use Application\DTO\DatabaseConfigDTO;
use Exception;
use PDO;
use PDOException;

class Database extends DatabaseConnection {

    private PDO $connect;
    private static ?Database $db = null;

    private array $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    private function __construct(DatabaseConfigDTO $options) {
        try {
            $this->connect = new PDO('mysql:host='. $options->host .';dbname='. $options->databaseName,
                $options->user,
                $options->pass,
                $this->options
            );
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            exit();
        }
    }

    public static function connect(DatabaseConfigDTO $options): Database
    {
        if (self::$db === null)
        {
            self::$db = new Database($options);
        }

        return self::$db;
    }

    public function getConnection(): PDO
    {
        return $this->connect;
    }

    private function __clone() {}

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }
}