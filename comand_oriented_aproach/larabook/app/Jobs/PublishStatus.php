<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Statuses\Status;
use App\Statuses\StatusRepository;
use App\Users\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Events\Dispatcher;

class PublishStatus extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $body;
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new job instance.
     * @param $status
     * @param User $user
     */
    public function __construct($status, User $user)
    {
        $this->body = $status;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param Status $status
     * @param Dispatcher $event
     * @param StatusRepository $statusRepository
     */
    public function handle(Status $status, Dispatcher $event, StatusRepository $statusRepository)
    {
        $status = $status->publish($this->body, $event);

        $statusRepository->save($status, $this->user);
    }
}
