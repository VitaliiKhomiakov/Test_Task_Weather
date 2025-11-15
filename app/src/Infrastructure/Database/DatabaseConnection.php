<?php

declare(strict_types=1);

namespace Infrastructure\Database;

use Application\DTO\DatabaseConfigDTO;
use PDO;

abstract class DatabaseConnection {
    abstract public static function connect(DatabaseConfigDTO $options);
    abstract public function getConnection(): PDO;
}
