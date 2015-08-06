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

use Illuminate\Http\RedirectResponse;

Route::get('/', ['as' => 'home', 'uses' => function () {
    return view('welcome');
}]);


Route::get('about', 'PagesController@about');


Route::get('buy', function () {
    return \Redirect::home()->with('flash_message', 'Foo');
});

Route::get('support/create', 'SupportController@create');
Route::post('support/store', 'SupportController@store');


