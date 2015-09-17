<?php

namespace App\Http\Controllers;

use App\Jobs\FallowUser;
use App\Jobs\UnfallowUser;
use Flash;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Input;
use Redirect;

class FallowersController extends Controller
{
    /**
     * @var Dispatcher
     */
    private $dispatcher;

    function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Fallow a User
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $newRequestParams = array_add($request->all(), 'userId', Auth::id());
        $request->replace($newRequestParams);
        $this->dispatcher->dispatchFrom(FallowUser::class, $request);

        Flash::success('You are now fallowing this user');
        return Redirect::back();
    }

    /**
     * Unfallow a User
     *
     * @param $userIdToUnfallow
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($userIdToUnfallow, Request $request)
    {
        $request->replace(array_add($request->all(), 'userId', Auth::id()));

        $this->dispatcher->dispatchFrom(UnfallowUser::class, $request);

        Flash::success('You have now unfallowed this user');

        return Redirect::back();
    }
}
