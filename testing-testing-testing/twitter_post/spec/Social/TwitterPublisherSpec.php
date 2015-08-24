<?php

namespace spec\App\Social;

use App\Social\TwitterPublisher;
use GuzzleHttp\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TwitterPublisherSpec extends ObjectBehavior
{
    function let(Client $client)
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TwitterPublisher::class);
    }

    function it_publishes_a_status(Client $client)
    {
        $status = 'Test Status';

        $client->post('https://api.twitter.com/1.1/statuses/update.json?' . http_build_query(compact('status')))
            ->shouldBeCalled();

        $this->publish($status);

    }
}
