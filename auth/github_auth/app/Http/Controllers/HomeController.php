<?php

namespace App\Http\Controllers;

use App\Accounts\Providers\Contracts\Provider;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * @var Provider
     */
    private $provider;

    function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    public function authorize()
    {
        return $this->provider->authorize();
    }

    public function login()
    {
        $this->provider->login(Input::get('code'));
    }

}
