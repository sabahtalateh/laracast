<?php

namespace App\Accounts\Providers;

use GuzzleHttp\ClientInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;
use Psy\Util\Json;

/**
 * Class Provider
 * @package App\Accounts\Providers
 */
abstract class Provider
{
    /**
     * @var Redirector
     */
    protected $redirector;
    /**
     * @var String
     */
    protected $clientId;
    /**
     * @var String
     */
    protected $clientSecret;
    /**
     * @var ClientInterface
     */
    protected $http;

    /**
     * @param Redirector $redirector
     * @param ClientInterface $http
     * @param $clientId
     * @param $clientSecret
     */
    function __construct(Redirector $redirector, ClientInterface $http, $clientId, $clientSecret)
    {
        $this->redirector = $redirector;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->http = $http;
    }

    /**
     * @return mixed
     */
    abstract protected function getAuthUrl();

    /**
     * @return mixed
     */
    abstract protected function getAccessTokenUrl();

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authorize()
    {
        return $this->redirector->to($this->getAuthUrl());
    }

    /**
     * @param $token
     * @return mixed
     */
    abstract protected function getUserByToken($token);

    /**
     * @param $code
     */
    public function login($code)
    {
        $token = $this->requestAccessToken($code);

        $user = $this->getUserByToken($token);

        dd($user);
    }

    /**
     * @param $code
     */
    protected function requestAccessToken($code)
    {
        $response = $this->http->post($this->getAccessTokenUrl(), [
            'form_params' => [
                'code' => $code,
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret
            ],
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        return (json_decode($response->getBody()->getContents())->access_token);
    }


}