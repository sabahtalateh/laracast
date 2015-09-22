<?php

require 'vendor/autoload.php';

//$elevator = new Acme\Elevator\Elevator(new Acme\Elevator\EnvironmentMonitor);
//
//$elevator->addPerson('John Doe');
//$elevator->addPerson('Jane Doe');
//$elevator->addPerson('Mike Doe');
//
//$elevator->checkForAlarms();

$books = [
    'Harry Potter',
    'Lord of the Rings',
    'Orange Baby',
    'Total Recal'
];

$library = new \Acme\Library\Library(new \Acme\Library\BookCollection($books));

$me = new \Acme\Library\Member();

$me->checkOut('Harry Potter', $library);
$me->checkOut('Total Recal', $library);

var_dump($library->books());

