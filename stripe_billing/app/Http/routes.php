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

use App\Billing\BillingInterface;
use App\Billing\StripeBilling;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

Route::get('/', function ()
{
    return view('welcome');
});

get('buy', function ()
{
    return view('buy');
});

post('buy', function ()
{
    try
    {
        $billing = App::make(BillingInterface::class);

        $customerId = $billing->charge([
            'email' => Input::get('email'),
            'token' => Input::get('stripe-token')
        ]);

        $user = \App\User::first();
        $user->billing_id = $customerId;
        $user->save();
    }
    catch (Exception $e)
    {
        return \Illuminate\Support\Facades\Redirect::refresh()->withErrors($e->getMessage())->withInput();
    }
});
