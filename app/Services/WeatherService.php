<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService {

    private string $key = '574715c7694f4b97b7c84bdf1704353b';
    private string $location;
    private string $endpoint;

    public function __construct(string $location) {
        $this->location = $location;

        $this->makeEndpoint();
    }

    public function requestApi() {
        $response = Http::get($this->endpoint);

        return $response;
    }

    public function makeEndpoint() {
        $this->endpoint = "https://api.openweathermap.org/data/2.5/weather?appid={$this->key}&units=metric&{$this->location}";
    }
}
