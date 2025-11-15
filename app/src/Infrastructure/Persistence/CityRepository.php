<?php

declare(strict_types=1);

namespace Infrastructure\Persistence;

use Application\Providers\City\Search\CitySearchRepositoryInterface;
use Domain\Model\City;
use Infrastructure\Database\DatabaseConnection;
use PDO;

class CityRepository extends Repository implements CitySearchRepositoryInterface {
    private DatabaseConnection $connection;

    public function __construct(DatabaseConnection $connection) {
        $this->connection = $connection;
    }

    public function search(string $searchText, int $limit = 5): array {
        $searchText = trim($searchText);

        if ($searchText === '') {
            return [];
        }

        $pattern = $this->escapeLike($searchText) . '%';

        // select consonant cities and cities that partially coincide with the spelling
        $query = $this->connection->getConnection()
            ->prepare('SELECT `city`.`id`, `city`.`city`, `city`.`lat`, `city`.`lng`, `city`.`country` 
                FROM `city` WHERE
                `city`.`city` LIKE :rLike ESCAPE \'\\\\\' OR
                SOUNDEX(`city`.`city`) = SOUNDEX(:city) LIMIT :limit');

        $query->bindValue('city', $searchText);
        $query->bindValue('rLike', $pattern);
        $query->bindValue('limit', $limit, PDO::PARAM_INT);
        $query->execute();

        $cities = $query->fetchAll();

        foreach ($cities as &$city) {
            $city = new City(
                (int) $city['id'],
                (string) $city['city'],
                (string) $city['lat'],
                (string) $city['lng'],
                (string) $city['country']
            );
        }

        return $cities;
    }

    private function escapeLike(string $value): string {
        return addcslashes($value, "\_%\\");
    }
}
