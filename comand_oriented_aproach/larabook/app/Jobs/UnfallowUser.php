<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Users\UserRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class UnfallowUser extends Job implements SelfHandling
{
    /**
     * @var
     */
    private $userId;
    /**
     * @var
     */
    private $userIdToUnfallow;

    /**
     * Create a new job instance.
     * @param $userId
     * @param $userIdToUnfallow
     */
    public function __construct($userId, $userIdToUnfallow)
    {
        $this->userId = $userId;
        $this->userIdToUnfallow = $userIdToUnfallow;
    }

    /**
     * Execute the job.
     *
     * @param UserRepository $userRepository
     */
    public function handle(UserRepository $userRepository)
    {
        $unfallower = $userRepository->findById($this->userId);
        $userToUnfallow = $userRepository->findById($this->userIdToUnfallow);

        $userRepository->unfallow($userToUnfallow, $unfallower);
    }
}
