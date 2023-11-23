<html lang="eu">
<div class="weather-info">
    <h3>{{ $data['name'] }}</h3>
    <div class="temperature">
        <strong>Температура:</strong> {{ $data['main']['temp'] }}°C
    </div>
    <div class="feels-like">
        <strong>Ощущается как:</strong> {{ $data['main']['feels_like'] }}°C
    </div>
    <div class="description">
        <strong>Описание:</strong> {{ $data['weather'][0]['description'] }}
    </div>
    <div class="humidity">
        <strong>Влажность:</strong> {{ $data['main']['humidity'] }}%
    </div>
    <div class="wind">
        <strong>Скорость ветра:</strong> {{ $data['wind']['speed'] }} м/с
    </div>
</div>
</html>
