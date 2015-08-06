<?php

namespace Acme;

class TasksController
{
    private $authorizer;
    /**
     * @var TaskRepository
     */
    private $repository;

    public function __construct(Authorizer $authorizer, TaskRepository $repository)
    {
        $this->authorizer = $authorizer;
        $this->repository = $repository;
    }

    public function store()
    {
        var_dump($this->authorizer->guest());

        if ($this->authorizer->guest()) {
            return 'redirect';
        } else {
            $this->repository->create('...');
        }
    }
}
