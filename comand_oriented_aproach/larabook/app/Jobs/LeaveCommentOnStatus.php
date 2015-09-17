<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Statuses\Comment;
use App\Statuses\StatusRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class LeaveCommentOnStatus extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $userId;
    /**
     * @var
     */
    private $statusId;
    /**
     * @var
     */
    private $body;

    /**
     * Create a new job instance.
     * @param $user_id
     * @param $status_id
     * @param $body
     */
    public function __construct($user_id, $status_id, $body)
    {
        $this->userId = $user_id;
        $this->statusId = $status_id;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @param StatusRepository $statusRepository
     */
    public function handle(StatusRepository $statusRepository)
    {
        $comment = new Comment([
            'user_id' => $this->userId,
            'status_id' => $this->statusId,
            'body' => $this->body
        ]);

        $statusRepository->leaveComment($comment);
    }
}
