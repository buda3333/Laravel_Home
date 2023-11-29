<?php

namespace Tests\Unit;

use App\Http\Controllers\WeatherController;
use App\Services\WeatherService;
use Illuminate\Contracts\View\View;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function testShow()
    {
        $code = 524901;
        $weatherServiceMock = $this->createMock(WeatherService::class);
        $weatherServiceMock->expects($this->once())
            ->method('getWeather')
            ->with($code)
            ->willReturn(['temperature' => 25, 'description' => 'Sunny']);

        $controller = new WeatherController();
        $response = $controller->show($code);
        $this->assertInstanceOf(View::class, $response);
        $data = $response->getData();
        $this->assertEquals(['temperature' => 25, 'description' => 'Sunny'], $data->data);
    }
}
