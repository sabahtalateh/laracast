<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

/**
 * Class RegistrationController
 * @package App\Http\Controllers
 */
class RegistrationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('registration.create');
    }

    /**
     * @param Requests\SignUpRequest $request
     * @return
     */
    public function store(Requests\SignUpRequest $request)
    {
        $user = User::create($request->only('username', 'email', 'password'));

        \Auth::login($user);

        return Redirect::home();
    }
}
