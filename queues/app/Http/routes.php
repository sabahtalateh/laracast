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

use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

get('send_welcome/{id}', 'UsersController@sendWelcomeEmail');

get('carbon', function () {

    $time = Carbon::now()->addDays(4)->addMinutes(25)->timestamp;
    $date = Carbon::createFromTimestamp($time);

    echo $date->diffForHumans();
    echo '<br/>';
    echo $date->startOfCentury();
    echo '<br/>';
    $date = Carbon::now();
    echo $date->toAtomString();
    echo '<br/>';
    $date->toDateString();


});
