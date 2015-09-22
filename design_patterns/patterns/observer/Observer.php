<?php

/**
 * Interface Subject
 */
interface Subject   // Publisher
{
    /**
     * @param array|Observer $observable
     * @return mixed
     */
    public function attach($observable);

    /**
     * @param $observerIndex
     * @return mixed
     */
    public function detach($observerIndex);

    /**
     * @return mixed
     */
    public function notify();
}

/**
 * Interface Observer
 */
interface Observer  // Subscriber
{
    /**
     * @return mixed
     */
    public function handle();
}

/**
 * Class Login
 */
class Login implements Subject
{
    /**
     * @var
     */
    protected $observers = [];

    /**
     * @param array|Observer $observable
     * @return $this
     * @throws Exception
     */
    public function attach($observable)
    {
        if (is_array($observable)) {
            $this->attachObservers($observable);
        } else {
            array_push($this->observers, $observable);
        }

        return $this;
    }

    /**
     * @param $observerIndex
     * @return mixed|void
     */
    public function detach($observerIndex)
    {
        unset($this->observers[$observerIndex]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }

    /**
     * @param $observable
     * @throws Exception
     */
    private function attachObservers($observable)
    {
        foreach ($observable as $observer) {
            if ( ! $observer instanceof Observer)
                throw new Exception;
            $this->attach($observer);
        }
    }

    public function fire()
    {
        $this->notify();
    }
}

/**
 * Class LogHandler
 */
class LogHandler implements Observer
{
    public function handle()
    {
        var_dump("Log something");
    }
}

/**
 * Class EmailHandler
 */
class EmailHandler implements Observer
{
    public function handle()
    {
        var_dump('Send an email');
    }
}

/**
 * Class EmailHandler
 */
class Reporter implements Observer
{
    public function handle()
    {
        var_dump('Reporting');
    }
}

$login = new Login;
$login->attach([
    new LogHandler,
    new EmailHandler
])->attach(new Reporter);

$login->fire();

