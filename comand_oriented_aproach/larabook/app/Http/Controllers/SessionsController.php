<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Redirect;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * @param SignInRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SignInRequest $request)
    {
        $input = $request->only('email', 'password');

        if (!\Auth::attempt($input)) {
            Flash::message('Wrong credentials');
            return Redirect::back()->withInput();
        }

        Flash::message('Welcome Back!');
        return Redirect::intended('statuses');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        \Auth::logout();

        \Flash::message('You now are logged out');

        return Redirect::home();
    }
}
