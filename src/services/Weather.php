<?php

class Weather
{
    private string $apiKey;
    private string $city;
    private string $state;
    private string $country;

    public function __construct()
    {
        $this->apiKey = $_ENV['WEATHER_API_KEY'] ?? '';
        $this->city   = $_ENV['WEATHER_CITY'] ?? 'Lake City';
        $this->state  = $_ENV['WEATHER_STATE'] ?? 'FL';
        $this->country = $_ENV['WEATHER_COUNTRY'] ?? 'US';
    }

    public function getCurrent(): array
    {
        $query = urlencode("{$this->city},{$this->state},{$this->country}");
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$query}&appid={$this->apiKey}&units=imperial";

        $context = stream_context_create(['http' => ['ignore_errors' => true]]);
        $response = file_get_contents($url, false, $context);

        if ($response === false) {
            return ['error' => 'Failed to connect to weather service'];
        }

        $data = json_decode($response, true);

        if (isset($data['cod']) && $data['cod'] !== 200) {
            return ['error' => "Weather API error: {$data['message']}"];
        }


        if ($response === false) {
            return ['error' => 'Failed to fetch weather data'];
        }

        $data = json_decode($response, true);

        return [
            'city'        => $data['name'],
            'temp'        => round($data['main']['temp']),
            'feels_like'  => round($data['main']['feels_like']),
            'humidity'    => $data['main']['humidity'],
            'description' => ucfirst($data['weather'][0]['description']),
            'icon'        => $data['weather'][0]['icon'],
            'wind'        => round($data['wind']['speed']),
        ];
    }
}
