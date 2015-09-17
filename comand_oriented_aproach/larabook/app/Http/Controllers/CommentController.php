<?php

namespace App\Http\Controllers;

use App\Jobs\LeaveCommentOnStatus;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{

    /**
     * Leave a comment
     *
     * @param  Request $request
     * @param Dispatcher $dispatcher
     * @return Response
     */
    public function store(Request $request, Dispatcher $dispatcher)
    {
        $request->replace(array_add($request->all(), 'user_id', \Auth::id()));

        $dispatcher->dispatchFrom(LeaveCommentOnStatus::class, $request);

        return \Redirect::back();
    }
}
