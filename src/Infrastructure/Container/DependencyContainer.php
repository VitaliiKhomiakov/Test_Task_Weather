<?php
declare(strict_types=1);

namespace Infrastructure\Container;

use Application\Components\City\Search\CitySearchService;
use Application\Components\City\Validate\CityValidator;
use Application\DTO\DatabaseConfigDTO;
use Config;
use Infrastructure\Common\GetParameters;
use Infrastructure\Common\PostParameters;
use Infrastructure\Common\Request;
use Infrastructure\Database\Database;
use Infrastructure\Persistence\CityRepository;

class DependencyContainer
{
    private Request $request;
    private Database $database;

    public function __construct()
    {
        $this->request = new Request(
            new GetParameters($_GET),
            new PostParameters($_POST)
        );

        $this->database = Database::connect(
            new DatabaseConfigDTO([
                'user' => Config::USER_DB,
                'pass' => Config::PASS_DB,
                'host' => Config::DB_HOST,
                'databaseName' => Config::DB_NAME
            ])
        );
    }

    public function getRequest(): Request {
        return $this->request;
    }

    public function getDatabase(): Database {
        return $this->database;
    }

    public function getCityRepository(): CityRepository {
        return new CityRepository($this->database);
    }

    public function getCitySearchService(): CitySearchService {
        return new CitySearchService($this->getCityRepository());
    }

    public function getCityValidator(): CityValidator {
        return new CityValidator();
    }
}
