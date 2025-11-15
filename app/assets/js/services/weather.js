import {Http} from './http.js';

export class Weather {
    #http;

    constructor() {
        this.#http = new Http();
    }

    getWeather(latitude = 0, longitude = 0) {
        return this.#http.get(`https://api.open-meteo.com/v1/forecast?latitude=${latitude}&longitude=${longitude}&current_weather=true`)
    }
}