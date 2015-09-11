<?php


use App\Statuses\Status;
use App\Statuses\StatusRepository;
use App\Users\User;
use Laracasts\TestDummy\Factory;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    /**
     * @var StatusRepository
     */
    private $repo;

    protected function _before()
    {
        $this->repo = new StatusRepository;
    }

    /** @test */
    public function it_gets_all_statuses_for_user()
    {
        // Given I have two users
        $users = Factory::times(2)->create(User::class);

        // And statuses fro both of them
        Factory::times(2)->create(Status::class, [
            'user_id' => $users[0]->id,
            'body' => 'First user\'s status'
        ]);
        Factory::times(2)->create(Status::class, [
            'user_id' => $users[1]->id,
            'body' => 'Second user\'s status'
        ]);

        // When I fetch statuses for one user
        $statusesForUser = $this->repo->getAllForUser($users[0]);

        // Then I should receive the relevant ones
        $this->assertCount(2, $statusesForUser);
        $this->assertEquals('First user\'s status', $statusesForUser[0]->body);
        $this->assertEquals('First user\'s status', $statusesForUser[1]->body);

    }

    /** @test */
    public function it_saves_a_status_for_a_specific_user()
    {
        // Given I have unsaved status
        $status = Factory::build(Status::class, [
            'user_id' => null,
            'body' => 'My Status'
        ]);

        // And an existing user
        $user = Factory::create(User::class);

        // When I try to persist this status
        $savedStatus = $this->repo->save($status, $user);

        // Then it should be saved
        $this->tester->seeRecord('statuses', [
            'body' => 'My Status'
        ]);

        // And the status should have the correct user_id
        $this->assertEquals($user->id, $savedStatus->user_id);
    }
}