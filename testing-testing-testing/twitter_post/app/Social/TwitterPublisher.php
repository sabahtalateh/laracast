<?php

namespace App\Social;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class TwitterPublisher
{
    private $makeTweetUrl = 'https://api.twitter.com/1.1/statuses/update.json';

    /**
     * @var Client
     */
    private $guzzle;

    function __construct(Client $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function publish($status)
    {
//        $this->guzzle->post('https://api.twitter.com/1.1/statuses/update.json?status=' . urlencode($status));
        $this->guzzle->post($this->getMakeTweetUrl($status));
    }

    private function getMakeTweetUrl($status)
    {
        return $this->makeTweetUrl . '?' . http_build_query(compact('status'));
    }
}