<?php

declare(strict_types=1);

namespace Domain\Model;

use JsonSerializable;

readonly class City implements JsonSerializable {
    public function __construct(
        public int $id,
        public string $city,
        public string $lat,
        public string $lng,
        public string $country
    ) {
    }

    public function jsonSerialize(): array {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'country' => $this->country,
        ];
    }
}
