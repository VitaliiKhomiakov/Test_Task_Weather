export class Weather {

    // create html item with weather info
    createWeatherItem(cityModel, weatherData) {
        // container
        const weatherItem = document.createElement('div');

        // city info
        const city = document.createElement('div');
        city.textContent = 'Selected city: ' + cityModel.getCity();

        // options - contain temperature and windSpeed data
        const options = document.createElement('div');
        const temperature = document.createElement('div');
        temperature.textContent = 'Temperature: ' + weatherData.current_weather.temperature;
        const windSpeed = document.createElement('div');
        windSpeed.textContent = 'Wind speed: ' + weatherData.current_weather.windspeed;

        // create html structure
        options.appendChild(temperature);
        options.appendChild(windSpeed);
        weatherItem.appendChild(city);
        weatherItem.appendChild(options);
        return weatherItem;
    }
}