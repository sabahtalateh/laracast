<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Jobs\PublishStatus;
use App\Statuses\StatusRepository;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Contracts\Bus\Dispatcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Redirect;

class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param StatusRepository $statusRepository
     * @return Response
     */
    public function index(StatusRepository $statusRepository)
    {
        $statuses = $statusRepository->getAllForUser(\Auth::user());

        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * @param CreatePostRequest $request
     * @param Dispatcher $dispatcher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request, Dispatcher $dispatcher)
    {
        $dispatcher->dispatch(new PublishStatus($request->all()['status'], \Auth::user()));

        \Flash::message('Your status has been updated');
        return Redirect::back();
    }
}
