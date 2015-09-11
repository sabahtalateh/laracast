<?php

namespace App\Jobs;

use App\Events\UserRegistered;
use App\Jobs\Job;
use App\Users\User;
use App\Users\UserRepository;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class RegisterUser
 * @package App\Jobs
 */
class RegisterUser extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    /**
     * @var
     */
    private $username;
    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $password;

    /**
     * Create a new job instance.
     * @param $username
     * @param $email
     * @param $password
     */
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Execute the job.
     * @param User $userModel
     * @param UserRepository $repository
     * @param Dispatcher $dispatcher
     */
    public function handle(User $userModel, UserRepository $repository, Dispatcher $dispatcher)
    {
        $user = $userModel->register(
            $this->username,
            $this->email,
            $this->password
        );

        $dispatcher->fire(new UserRegistered($user));

        $repository->save($user);
    }
}
