<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Users\UserRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class FallowUser extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $userIdToFallow;
    /**
     * @var
     */
    private $userId;

    /**
     * Create a new job instance.
     * @param $userIdToFallow
     * @param $userId
     */
    public function __construct($userIdToFallow, $userId)
    {
        $this->userIdToFallow = $userIdToFallow;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @param UserRepository $userRepository
     */
    public function handle(UserRepository $userRepository)
    {
        $fallower = $userRepository->findById($this->userId);
        $userToFallow = $userRepository->findById($this->userIdToFallow);

        $userRepository->fallow($userToFallow, $fallower);

        return $fallower;
    }
}
