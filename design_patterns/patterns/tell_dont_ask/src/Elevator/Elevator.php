<?php

namespace Acme\Elevator;

class Elevator
{
    protected $monitor;

    protected $occupants = [];

    function __construct(EnvironmentMonitor $monitor)
    {
        $this->monitor = $monitor;
    }

    public function addPerson($person)
    {
        $this->occupants[ ] = $person;
        $this->monitor->increaseTemperature();
    }

    public function checkForAlarms()
    {
        $this->monitor->checkForAlarms();
    }
}