<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmail;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function sendWelcomeEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $job = (new SendWelcomeEmail($user))->onQueue('emails');

        $this->dispatch($job);

        vd($user);
    }
}
