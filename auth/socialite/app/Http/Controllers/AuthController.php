<?php

namespace App\Http\Controllers;

use App\AuthenticateUser;
use App\AuthenticateUserListener;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller implements AuthenticateUserListener
{
    public function login(AuthenticateUser $authenticateUser, Request $request)
    {
        return $authenticateUser->execute($request->has('code'), $this);
    }

    public function userHasLoggedIn($user)
    {
        return redirect('/');
    }
}
