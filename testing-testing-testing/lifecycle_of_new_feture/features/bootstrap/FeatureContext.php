<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Laracasts\Behat\Context\DatabaseTransactions;
use Laracasts\Behat\Context\Migrator;
use Laracasts\TestDummy\Factory;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    use Migrator;
    use DatabaseTransactions;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am not logged in
     */
    public function iAmNotLoggedIn()
    {
        return;
    }

    /**
     * @Given there is a :title lesson
     * @param $title
     */
    public function thereIsALesson($title)
    {
        $slug = \Illuminate\Support\Str::slug($title);

        Factory::create(App\Lesson::class, compact('title', 'slug'));
    }

    /**
     * @When I go to this lesson page
     */
    public function iGoToThisLessonPage()
    {
        $this->visit('/lessons/example-lesson');
        $this->assertPageContainsText('Example Lesson');
        $this->assertPageContainsText('Buy this video');
    }

    /**
     * @When I purchase the video
     */
    public function iPurchaseTheVideo()
    {
        $this->clickLink('Buy this video');
    }

    /**
     * @Then I should be able to download it
     */
    public function iShouldBeAbleToDownloadIt()
    {
        $this->visit('/lessons/example-lesson');
        $this->assertPageContainsText('You can download the video');
        $this->getSession()->wait(5000);
    }

    /**
     * @Then I should be asked to sign up
     */
    public function iShouldBeAskedToSignUp()
    {
        $this->assertPageContainsText('Please authorize to watch this video');
    }

    /**
     * @Given I'm logged in without a subscription
     */
    public function iMLoggedInWithoutASubscription()
    {
        $this->signup();

    }

    private function signup()
    {
        $this->visit('auth/register');

        $this->fillField('name', 'alezzz');
        $this->fillField('email', 'sabahtalateh@gmail.com');
        $this->fillField('password', 'password');
        $this->fillField('password_confirmation', 'password');

        $this->pressButton('Register');
    }
}
