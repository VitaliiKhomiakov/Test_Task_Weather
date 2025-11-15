<?php

declare(strict_types=1);

namespace Infrastructure\Persistence;

use Infrastructure\Database\DatabaseConnection;

abstract class Repository {
    abstract public function __construct(DatabaseConnection $connection);
}
