<?php

namespace Tests\Unit;

use App\Http\Controllers\WeatherController;
use App\Services\WeatherService;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function testShow()
    {
        $code = 524901;
        $weatherServiceMock = $this->createMock(WeatherService::class);
        $weatherServiceMock->expects($this->once())
            ->method('getWeather')
            ->with($code);
    }
}
