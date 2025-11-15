import {Search} from './services/search.js';
import {City} from './components/city.js';
import {Weather} from './services/weather.js';
import {Weather as WeatherComponent} from './components/weather.js';

// init
const search = new Search();
const weather = new Weather();
const weatherComponent = new WeatherComponent();
new City(search, weather, weatherComponent);