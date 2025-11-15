<?php

declare(strict_types=1);

namespace Application\DTO;

class DatabaseConfigDTO {
    public function __construct(
        public string $user,
        public string $pass,
        public string $host,
        public string $databaseName
    ) {
    }
}
