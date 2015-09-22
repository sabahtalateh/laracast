<?php

require "vendor/autoload.php";

abstract class HomeChecker
{

    /**
     * @var HomeChecker
     */
    protected $successor;

    public abstract function check(HomeStatus $home);

    public function chainedWith(HomeChecker $successor)
    {
        $this->successor = $successor;

        return $this;
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor) {
            $this->successor->check($home);
        }
    }
}

class Locks extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( ! $home->locked) {
            throw new Exception('The doors are not locked!! Abort.');
        }

        $this->next($home);
    }
}

class Alarm extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( ! $home->alarmOn) {
            throw new Exception('The alarm is off!! Abort');
        }

        $this->next($home);
    }
}

class Lights extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if ( ! $home->lightsOff) {
            throw new Exception('The lights is on!! Abort.');
        }

        $this->next($home);
    }
}

class HomeStatus
{
    public $locked = true;
    public $alarmOn = true;
    public $lightsOff = true;
}

$status = new HomeStatus;

$locks = new Locks;
$alarm = new Alarm;
$lights = new Lights;

$locks->chainedWith($lights);
$lights->chainedWith($alarm);

$locks->check($status);

return 0;
