<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Jobs\RegisterUser;
use App\Users\User;
use App\Users\UserRepository;
use Illuminate\Contracts\Bus\Dispatcher as CommandDispatcher;
use Illuminate\Contracts\Events\Dispatcher as Event;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

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
     * @param CommandDispatcher $commandDispatcher
     *
     * @return
     */
    public function store(Requests\SignUpRequest $request, CommandDispatcher $commandDispatcher)
    {
        $commandDispatcher->dispatchFrom(RegisterUser::class, $request);

        \Auth::login(User::where('username', $request['username'])->first());

        Flash::overlay('Welcome!!');

        return Redirect::home();
    }
}
