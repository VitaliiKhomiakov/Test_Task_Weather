import {CityModel} from '../models/cityModel.js';

export class City {
    #searchInput;
    #cityList;
    #city;
    #resetCityButton;
    #weatherService;
    #searchService;
    #weatherComponent;
    #submitButton;

    constructor(searchService, weatherService, weatherComponent) {
        this.#weatherService = weatherService;
        this.#searchService = searchService;

        this.#weatherComponent = weatherComponent;

        // init items
        this.#searchInput = document.getElementById('city');
        this.#cityList = document.getElementById('city-list');
        this.#city = document.getElementById('city-list');
        this.#resetCityButton = document.getElementById('reset-city');
        this.#submitButton = document.getElementById('submit');

        // send a request when the user finishes typing
        const debouncedFunction = this.#debounce(async () => this.loadCities(), 700);

        this.#resetCityButton.addEventListener('click', () => this.#cityList.innerHTML = '');
        this.#searchInput.addEventListener('input', debouncedFunction);
        this.#submitButton.addEventListener('click', () => this.loadCities());
    }

    // display found cities
    addCities(cities) {
        this.#resetContent();

        if (!cities?.length) {
            this.#cityList.innerHTML = 'Nothing found';
            return;
        }

        cities.forEach(city => {
            const cityModel = new CityModel(city);
            this.#cityList.appendChild(this.#createCityItem(cityModel));
        });
    }

    // load data from API
    loadCities() {
        this.#searchService.search(this.#searchInput.value).then(cities => this.addCities(cities));
    }

    // load data from open-meteo.com
    loadWeather(cityModel) {
        this.#weatherService.getWeather(cityModel.getLat(), cityModel.getLng())
            .then(data => {
                this.#resetContent();
                this.#cityList.appendChild(
                    this.#weatherComponent.createWeatherItem(cityModel, data)
                );
            });
    }

    #createCityItem(cityModel) {
        const cityItem = document.createElement('li');
        cityItem.setAttribute('id', 'city-id-' + cityModel.getId());
        cityItem.textContent = cityModel.getCity();
        cityItem.onclick = () => this.loadWeather(cityModel);
        return cityItem;
    }

    #resetContent() {
        this.#cityList.innerHTML = '';
    }

    #debounce(func, wait) {
        let timeout;
        return () => {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                func.apply(context, args);
            }, wait);
        };
    }
}