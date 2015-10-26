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

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

get('/', function () {
//    $data = [
//        'event' => 'UserSignedUp',
//        'data' => [
//            'username' => 'JohnDoe'
//        ]
//    ];

//    Redis::publish('test-channel', json_encode($data));

    event(new \App\Events\UserSignedUp(\Illuminate\Support\Facades\Request::query('name')));

    return view('welcome');
});
