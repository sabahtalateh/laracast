<?php

namespace spec\App;

use App\AuthenticateUserListener;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\Two\ProviderInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AuthenticateUserSpec extends ObjectBehavior
{
    const HAS_CODE = true;

    const HAS_NO_CODE = false;

    function it_is_initializable()
    {
        $this->shouldHaveType('App\AuthenticateUser');
    }

    function let(UserRepository $repository, Factory $socialite, Guard $guard)
    {
        $this->beConstructedWith($repository, $socialite, $guard);
    }

    function it_authorizes_a_user(
        Factory $socialite,
        ProviderInterface $provider,
        AuthenticateUserListener $listener
    )
    {
        $provider->redirect()->shouldBeCalled();
        $socialite->driver('github')->willReturn($provider);
        $this->execute(static::HAS_NO_CODE, $listener);
    }

    function it_creates_a_user_if_authorization_is_granted(
        Factory $socialite,
        UserRepository $repository,
        Guard $guard,
        User $user,
        AuthenticateUserListener $listener
    )
    {
        $socialite->driver('github')->willReturn(new ProviderStub);
        $repository->findByUsernameOrCreate(ProviderStub::$data)->willReturn($user);
        $guard->login($user, static::HAS_CODE)->shouldBeCalled();
        $listener->userHasLoggedIn($user)->shouldBeCalled();

        $this->execute(self::HAS_CODE, $listener);
    }


}

class ProviderStub
{
    public static $data = [
        'id' => 1,
        'nickname' => 'foo',
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'avatar' => 'foo.jpg'
    ];

    public function user()
    {
        return self::$data;
    }
}
