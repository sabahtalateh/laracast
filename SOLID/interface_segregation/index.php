<?php

interface Managable
{
    public function beManaged();
}

interface Workable
{
    public function work();
}

interface Sleepable
{
    public function sleep();
}

class HumanWorker implements Workable, Sleepable, Managable
{

    public function work()
    {
        return 'human work';
    }

    public function sleep()
    {
        return 'human sleep';
    }

    public function beManaged()
    {
        $this->work();
        $this->sleep();
    }
}

class AndroidWorker implements Workable, Managable
{
    public function work()
    {
        return 'android work';
    }

    public function beManaged()
    {
        $this->work();
    }
}

class Captain
{
    public function manage(Managable $worker)
    {
        $worker->beManaged();
    }
}
