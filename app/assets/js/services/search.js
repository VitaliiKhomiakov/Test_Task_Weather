import {Http} from './http.js';

export class Search {
    #http;

    constructor() {
        this.#http = new Http();
    }

    search(searchText) {
        return this.#http.get('/city/search?city=' + searchText);
    }
}