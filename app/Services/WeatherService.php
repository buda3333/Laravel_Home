<?php

namespace App\Services;
use GuzzleHttp\Client;
use Stevebauman\Location\Facades\Location;

class WeatherService
{
    public function getWeather (int $code)
    {
        $client = new Client();
        $response = $client->get("http://api.openweathermap.org/data/2.5/weather?id=" . $code . "&lang=ru&units=metric&APPID=6edf2eb7d25f1a5735858c3477813ec9");
        return json_decode($response->getBody(), true);
    }
}
