<?php

class WeatherMonitor
{
    protected $service;

    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    public function getAverageTemperature(string $startTime, string $endTime)
    {
        $startTemp = $this->service->getTemperature($startTime);
        $endTemp = $this->service->getTemperature($endTime);

        return ($startTemp + $endTemp) / 2;
    }
}