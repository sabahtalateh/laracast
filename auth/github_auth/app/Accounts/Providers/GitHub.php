<?php

namespace App\Accounts\Providers;

use App\Accounts\Providers\Contracts\Provider as ProviderContract;

/**
 * Class GitHub
 * @package App\Accounts\Providers
 */
class GitHub extends Provider implements ProviderContract
{
    /**
     * @var string
     */
    protected $accessTokenUrl = 'https://github.com/login/oauth/access_token';

    /**
     * @return string
     */
    protected function getAuthUrl()
    {
        $url = 'https://github.com/login/oauth/authorize?';

        return $url . http_build_query([
            'client_id' => $this->clientId,
            'scope' => 'user:email'
        ]);
    }

    /**
     * @return string
     */
    protected function getAccessTokenUrl()
    {
        return $this->accessTokenUrl;
    }

    /**
     * @param $token
     * @return mixed
     */
    protected function getUserByToken($token)
    {
        $response = $this->http->get('https://api.github.com/user',[
            'headers' => [
                'Authorization' => "token {$token}"
            ]
        ]);

        return json_decode($response->getBody()->getContents());
    }
}