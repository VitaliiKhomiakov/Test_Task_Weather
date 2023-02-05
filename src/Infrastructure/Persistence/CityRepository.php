<?php
declare(strict_types=1);

namespace Infrastructure\Persistence;

use Domain\Model\City;
use Infrastructure\Database\DatabaseConnection;

class CityRepository extends Repository
{
    private DatabaseConnection $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function search(string $searchText): array
    {
        $query = $this->connection->getConnection()
            ->prepare('SELECT * FROM city WHERE SOUNDEX(city) = SOUNDEX(:city)');

        $query->execute(['city' => $searchText]);
        $cities = $query->fetchAll();

        foreach ($cities as &$city) {
            $city = new City($city);
        }

        return $cities;
    }
}