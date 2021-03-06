<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Auth;

get('/', function () {
    if (Auth::check()){
        return "Welcome back " . Auth::user()->username;
    }

    return "Hi guest " . link_to('login', 'Login With Github');

//    return view('welcome');
});

get('login', 'AuthController@login');
