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

use Illuminate\Support\Facades\Mail;

Route::get('/', 'HashingController@index');
Route::post('/', 'HashingController@postIndex');

Route::get('emailtest', function () {

    Mail::send('emails.email', [], function ($message){
        $message->to('sabahtalateh@gmail.com')->subject('OOOOPPP!!!');
    });

//    Mail::send('emails.welcome', [], function ($message) {
//        $message->to('joe@example.com', 'John Doe')->subject('Welcome!');
//    });
});
