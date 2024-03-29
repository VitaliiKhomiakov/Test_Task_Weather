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
        // select consonant cities and cities that partially coincide with the spelling
        $query = $this->connection->getConnection()
            ->prepare('SELECT `city`.`id`, `city`.`city`, `city`.`lat`, `city`.`lng`, `city`.`country` 
                FROM `city` WHERE
                `city`.`city` LIKE :rLike OR
                SOUNDEX(`city`.`city`) = SOUNDEX(:city) LIMIT :limit');

        $query->bindValue('city', $searchText);
        $query->bindValue('rLike', $searchText . '%');
        $query->bindValue('limit', $limit, PDO::PARAM_INT);
        $query->execute();

        $cities = $query->fetchAll();

        foreach ($cities as &$city) {
            $city = new City($city);
        }

        return $cities;
    }
}