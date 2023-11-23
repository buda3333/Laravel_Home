<?php

namespace App\Http\Controllers;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    public function show(int $code)
    {
        $weatherService = new WeatherService();
        $weatherData = $weatherService->getWeather($code);
        return view('weather_info', ['data' => $weatherData]);
    }
}
