<?php
namespace Users;


use App\Statuses\Status;
use App\Users\User;
use App\Users\UserRepository;
use Laracasts\TestDummy\Factory;

/**
 * Class UserRepositoryTest
 * @package Users
 */
class UserRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    /**
     * @var UserRepository
     */
    protected $repo;

    /**
     *
     */
    protected function _before()
    {
        $this->repo = new UserRepository;
    }

    /** @test */
    public function it_paginates_all_users()
    {
        Factory::times(4)->create(User::class);

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);
    }

    /** @test */
    public function it_finds_a_user_with_statuses_by_username()
    {
        # Given
        $user = Factory::create(User::class);
        $statuses = Factory::times(3)->create(Status::class, ['user_id' => $user->id]);

        # When
        $results = $this->repo->findByUsername($user->username);

        # Then
        $this->assertEquals($user->username, $results->username);
        $this->assertCount(3, $results->statuses);


    }

}