<?php

namespace App\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Illuminate\Support\ServiceProvider;
use App\Social\TwitterPublisher;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerTwitterProvider();
    }

    private function registerTwitterProvider()
    {
        $this->app->singleton(TwitterPublisher::class, function ($app) {
            $stack = HandlerStack::create();

            $middleware = new Oauth1([
                'consumer_key' => env('TWITTER_CONSUMER_KEY'),
                'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
                'token' => env('TWITTER_TOKEN'),
                'token_secret' => env('TWITTER_TOKEN_SECRET')
            ]);

            $stack->push($middleware);

            $guzzle = new Client([
                'base_uri' => 'https://api.twitter.com/1.1/',
                'handler' => $stack,
                'auth' => 'oauth'
            ]);

            return new TwitterPublisher($guzzle);
        });
    }
}
