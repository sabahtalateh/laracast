<?php

namespace App\Http\Controllers;

use App\Events\PostWasPublished;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use OAuth;
use App\Social\TwitterPublisher;

class PostsController extends Controller
{

    public function store($mess, Dispatcher $events)
    {
        $events->fire(new PostWasPublished($mess));

        return 'Done';
    }
}
