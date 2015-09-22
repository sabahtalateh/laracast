<?php

interface CarService
{
    public function getCost();

    public function getDescription();
}

class BasicInspections implements CarService
{
    /**
     * @var CarService
     */
    private $carService;

    function __construct(CarService $carService = null)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 25;
    }

    public function getDescription()
    {
        return "Basic inspection";
    }
}

class OilChange implements CarService
{
    /**
     * @var CarService
     */
    private $carService;

    function __construct(CarService $carService = null)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ", and oil change";
    }
}

class TireRotation implements CarService
{
    /**
     * @var CarService
     */
    private $carService;

    function __construct(CarService $carService = null)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ", and tire rotation";
    }
}

$service = (new TireRotation(new OilChange(new BasicInspections)));
echo $service->getCost(); echo PHP_EOL;
echo $service->getDescription(); echo PHP_EOL;


