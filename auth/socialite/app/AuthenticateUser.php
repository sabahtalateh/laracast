<?php
namespace App;

use App\Http\Controllers\AuthController;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthenticateUser
{

    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var Socialite
     */
    private $socialite;
    /**
     * @var Guard
     */
    private $guard;

    function __construct(UserRepository $users, Socialite $socialite, Guard $guard)
    {
        $this->users = $users;
        $this->socialite = $socialite;
        $this->guard = $guard;
    }

    public function execute($hasCode, AuthenticateUserListener $listener)
    {
        if (!$hasCode) {
            return $this->getAuthorizationFirst();
        } else {
            $user = $this->users->findByUsernameOrCreate($this->getGithubUser());
            $this->guard->login($user, true);

            return $listener->userHasLoggedIn($user);
        }
    }

    private function getAuthorizationFirst()
    {
        return $this->socialite->driver('github')->redirect();
    }

    private function getGithubUser()
    {
        return $this->socialite->driver('github')->user();
    }
}