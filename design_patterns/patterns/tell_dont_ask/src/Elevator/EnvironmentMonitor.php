<?php

namespace Acme\Elevator;


use Exception;

class EnvironmentMonitor
{
    protected $temperature = 70;

    public function increaseTemperature($degrees = 10)
    {
        $this->temperature += $degrees;
    }

    public function temperature()
    {
        return $this->temperature;
    }

    public function triggerAlarm()
    {
        throw new Exception('Too hot! Alarm.');
    }

    public function checkForAlarms()
    {
        if ($this->temperature >= 100) {
            $this->triggerAlarm();
        }
    }

}