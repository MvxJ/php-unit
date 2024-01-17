<?php

use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testCorrectAverageIsReturned()
    {
        $argsMap = [
            ['12:00', 20],
            ['14:00', 26]
        ];

        $serviceMock = $this->createMock(TemperatureService::class);
        $serviceMock->expects($this->exactly(2))->method('getTemperature')->will($this->returnValueMap($argsMap));

        $weatherMonitor = new WeatherMonitor($serviceMock);

        $this->assertEquals(23, $weatherMonitor->getAverageTemperature('12:00', '14:00'));
    }

    public function testCorrectAverageIsReturnedWithMockery()
    {
        $serviceMock = Mockery::mock(TemperatureService::class);
        $serviceMock->shouldReceive('getTemperature')->once()->with('12:00')->andReturn(20);
        $serviceMock->shouldReceive('getTemperature')->once()->with('14:00')->andReturn(26);

        $weatherMonitor = new WeatherMonitor($serviceMock);

        $this->assertEquals(23, $weatherMonitor->getAverageTemperature('12:00', '14:00'));
    }
}