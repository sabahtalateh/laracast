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

get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

Route::group(['middleware' => 'guest'], function () {
    get('register', [
        'as' => 'register_path',
        'uses' => 'RegistrationController@create'
    ]);

    post('register', [
        'as' => 'register_path',
        'uses' => 'RegistrationController@store'
    ]);
});

Route::group(['middleware' => 'guest'], function () {
    get('login', [
        'as' => 'login_path',
        'uses' => 'SessionsController@create'
    ]);

    post('login', [
        'as' => 'login_path',
        'uses' => 'SessionsController@store'
    ]);
});

get('logout', [
    'middleware' => 'auth',
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);

get('/statuses', [
    'as' => 'statuses_path',
    'middleware' => 'auth',
    'uses' => 'StatusesController@index'
]);

post('/statuses', [
    'as' => 'statuses_path',
    'middleware' => 'auth',
    'uses' => 'StatusesController@store'
]);

get('users', [
    'as' => 'users_path',
    'uses' => 'UsersController@index'
]);

get('@{username}', [
    'as' => 'profile_path',
    'uses' => 'UsersController@show'
]);

post('fallows', [
    'as' => 'fallows_path',
    'uses' => 'FallowersController@store'
]);

delete('fallows/{id}', [
    'as' => 'fallow_path',
    'uses' => 'FallowersController@destroy'
]);

// Password reset link request routes...
get('password/email', [
    'as' => 'password_reset_path',
    'uses' => 'Auth\PasswordController@getEmail'
]);
post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
get('password/reset/{token}', 'Auth\PasswordController@getReset');
post('password/reset', [
    'as' => 'password_reset_path',
    'uses' => 'Auth\PasswordController@postReset'
]);

post('statuses/{id}/comments', [
    'as' => 'comment_path',
    'uses' => 'CommentController@store'
]);
