<?php
declare(strict_types=1);

namespace Domain\Model;

class City
{
    private int $id;
    private string $city;
    private string $lat;
    private string $lng;
    private string $country;

    public function __construct(array $cityData)
    {
        $this->id = $cityData['id'];
        $this->city = $cityData['city'];
        $this->lat = $cityData['lat'];
        $this->lng = $cityData['lng'];
        $this->country = $cityData['country'];
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getLng(): string
    {
        return $this->lng;
    }

    /**
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
