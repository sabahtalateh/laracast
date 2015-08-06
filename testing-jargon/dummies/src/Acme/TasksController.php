<?php

namespace Acme;

class TasksController
{
    private $authorizer;

    public function __construct(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;
    }

    public function show()
    {
        var_dump($this->authorizer->guest());
        return 'a task';
    }
}
