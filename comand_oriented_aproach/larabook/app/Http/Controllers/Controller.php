<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

abstract class Controller extends BaseController
{
    public function __construct()
    {
        View::share('currentUser', \Auth::user());
        View::share('signedIn', \Auth::user());
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
