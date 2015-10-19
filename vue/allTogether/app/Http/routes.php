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

get('checkout', function () {
    return view('store.checkout');
});

// API

get('api/coupons/{code}', function ($code) {
    return \App\Coupon::whereCode($code)->firstOrFail();
});
