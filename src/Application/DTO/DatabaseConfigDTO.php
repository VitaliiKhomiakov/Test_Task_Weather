<?php
declare(strict_types=1);

namespace Application\DTO;

class DatabaseConfigDTO {

    public string $user;
    public string $pass;
    public string $host;
    public string $databaseName;

    public function __construct(array $options) {
        $this->user = $options['user'];
        $this->pass = $options['pass'];
        $this->host = $options['host'];
        $this->databaseName = $options['databaseName'];
    }
}