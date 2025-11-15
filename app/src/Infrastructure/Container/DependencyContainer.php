<?php

declare(strict_types=1);

namespace Infrastructure\Container;

use Application\Components\City\Search\CitySearchController;
use Application\Components\City\Search\CitySearchService;
use Application\Components\City\Validate\CityValidator;
use Application\Components\Home\HomeController;
use Application\DTO\DatabaseConfigDTO;
use Application\Providers\City\Search\CitySearchServiceInterface;
use Application\Config\AppConfig;
use Closure;
use Infrastructure\Common\GetParameters;
use Infrastructure\Common\PostParameters;
use Infrastructure\Common\Request;
use Infrastructure\Database\Database;
use Infrastructure\Persistence\CityRepository;
use RuntimeException;

class DependencyContainer {
    /**
     * @var array<class-string, Closure>
     */
    private array $factories = [];

    /**
     * @var array<class-string, object>
     */
    private array $instances = [];

    public function __construct() {
        $this->registerServices();
    }

    private function registerServices(): void {
        $this->factories[Request::class] = static function (): Request {
            return new Request(
                new GetParameters($_GET),
                new PostParameters($_POST)
            );
        };

        $this->factories[Database::class] = static function (): Database {
            return Database::connect(
                new DatabaseConfigDTO(
                    AppConfig::getDbUser(),
                    AppConfig::getDbPassword(),
                    AppConfig::getDbHost(),
                    AppConfig::getDbName()
                )
            );
        };

        $this->factories[CityRepository::class] = function (): CityRepository {
            return new CityRepository($this->get(Database::class));
        };

        $this->factories[CitySearchServiceInterface::class] = function (): CitySearchServiceInterface {
            return new CitySearchService($this->get(CityRepository::class));
        };

        $this->factories[CityValidator::class] = static function (): CityValidator {
            return new CityValidator();
        };

        $this->factories[CitySearchController::class] = function (): CitySearchController {
            return new CitySearchController(
                $this->get(CitySearchServiceInterface::class),
                $this->get(Request::class),
                $this->get(CityValidator::class)
            );
        };

        $this->factories[HomeController::class] = static function (): HomeController {
            return new HomeController();
        };
    }

    public function make(string $id): object {
        return $this->get($id);
    }

    /**
     * @template T of object
     * @param class-string<T> $id
     * @return T
     */
    private function get(string $id): object {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        if (!isset($this->factories[$id])) {
            throw new RuntimeException(sprintf('Service "%s" is not registered.', $id));
        }

        $this->instances[$id] = ($this->factories[$id])();

        return $this->instances[$id];
    }
}
