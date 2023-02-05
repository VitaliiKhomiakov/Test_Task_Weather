<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Weather App</title>
</head>

<body>
<div class="top-container">
    <section class="current">
        <div class="current-top">
            <div class="current-temp"><span data-current-temp>32</span>&deg;C</div>
        </div>
        <div class="current-bottom">
            <div class="info-group">
                <div class="label">High</div>
                <div class="label-value"><span data-current-high>33</span>&deg;C</div>
            </div>
            <div class="info-group">
                <div class="label">Low</div>
                <div class="label-value"><span data-current-low>29</span>&deg;C</div>
            </div>
            <div class="info-group">
                <div class="label">FL High</div>
                <div class="label-value"><span data-current-fl-high>35</span>&deg;C</div>
            </div>
            <div class="info-group">
                <div class="label">FL Low</div>
                <div class="label-value"><span data-current-fl-low>28</span>&deg;C</div>
            </div>
            <div class="info-group">
                <div class="label">Wind</div>
                <div class="label-value"><span data-current-wind>12</span> km/h</div>
            </div>
            <div class="info-group">
                <div class="label">Precip</div>
                <div class="label-value"><span data-current-precip>15</span> mm</div>
            </div>
            <div class="info-group">
                <div class="label">Sunrise</div>
                <div class="label-value"><span data-current-sunrise>6:56</span></div>
            </div>
            <div class="info-group">
                <div class="label">Sunset</div>
                <div class="label-value"><span data-current-sunset>5:40</span></div>
            </div>
        </div>

    </section>
    <section class="next-days" data-next-days>
        <div class="day-info">
            <div class="day-info-date">Monday</div>
            <div>30&deg;C</div>
        </div>
        <div class="day-info">
            <div class="day-info-date">Tueday</div>
            <div>29&deg;C</div>
        </div>
        <div class="day-info">
            <div class="day-info-date">Wednesday</div>
            <div>30&deg;C</div>
        </div>
        <div class="day-info">
            <div class="day-info-date">Thursday</div>
            <div>31&deg;C</div>
        </div>
        <div class="day-info">
            <div class="day-info-date">Friday</div>
            <div>30&deg;C</div>
        </div>
        <div class="day-info">
            <div class="day-info-date">Saturday</div>
            <div>30&deg;C</div>
        </div>
    </section>
</div>

<table class="hourly">
    <tbody data-hourly>
    <tr class="hour-info">
        <td>
            <div class="info-group">
                <div class="day-info-date">Monday</div>
                <div>4 PM</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">FL Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Wind</div>
                <div>6<span> km/h</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Precip</div>
                <div>1<span> mm</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Visibility</div>
                <div>10245<span> m</span></div>
            </div>
        </td>
    </tr>
    <tr class="hour-info">
        <td>
            <div class="info-group">
                <div class="day-info-date">Monday</div>
                <div>5 PM</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">FL Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Wind</div>
                <div>6<span> km/h</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Precip</div>
                <div>1<span> mm</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Visibility</div>
                <div>10245<span> m</span></div>
            </div>
        </td>
    </tr>
    <tr class="hour-info">
        <td>
            <div class="info-group">
                <div class="day-info-date">Monday</div>
                <div>6 PM</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">FL Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Wind</div>
                <div>6<span> km/h</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">

                <div class="day-info-date">Precip</div>
                <div>1<span> mm</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Visibility</div>
                <div>10245<span> m</span></div>
            </div>
        </td>
    </tr>
    <tr class="hour-info">
        <td>
            <div class="info-group">
                <div class="day-info-date">Monday</div>
                <div>7 PM</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">FL Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Wind</div>
                <div>6<span> km/h</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Precip</div>
                <div>1<span> mm</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Visibility</div>
                <div>10245<span> m</span></div>
            </div>
        </td>
    </tr>
    <tr class="hour-info">
        <td>
            <div class="info-group">
                <div class="day-info-date">Monday</div>
                <div>8 PM</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">FL Temp</div>
                <div>30&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Wind</div>
                <div>6<span> km/h</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Precip</div>
                <div>1<span> mm</span></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Visibility</div>
                <div>10245<span> m</span></div>
            </div>
        </td>
    </tr>
    </tbody>
</table>

<template id="day-info-template">
    <div class="day-info">
        <div class="day-info-date" data-day></div>
        <div><span data-temp></span>&deg;C</div>
    </div>
</template>
<template id="hour-info-template">
    <tr class="hour-info">
        <td>
            <div class="info-group">
                <div class="day-info-date" data-hourly-day></div>
                <div data-hour></div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Temp</div>
                <div><span data-hourly-temp></span>&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">FL Temp</div>
                <div><span data-hourly-fl-temp></span>&deg;C</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Wind</div>
                <div><span data-hourly-wind></span> km/h</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Precip</div>
                <div><span data-hourly-precip></span> mm</div>
            </div>
        </td>
        <td>
            <div class="info-group">
                <div class="day-info-date">Visibility</div>
                <div><span data-hourly-visibility></span> m</div>
            </div>
        </td>
    </tr>
</template>
<script type="module" src="./assets/js/script.js"></script>
</body>
</html>
