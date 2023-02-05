export class CityModel {
    #id;
    #city;
    #country;
    #lat
    #lng;

    constructor(city = {}) {
        this.#id = city.id;
        this.#city = city.city;
        this.#country = city.country;
        this.#lat = city.lat;
        this.#lng = city.lng;
    }

    getId() {
        return this.#id;
    }

    getCity() {
        return this.#city;
    }

    getCountry() {
        return this.#country;
    }

    getLat() {
        return this.#lat;
    }

    getLng() {
        return this.#lng;
    }
}