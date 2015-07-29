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

//Event::listen('illuminate.query', function($query){
//    vd($query);
//});

use App\User;

Route::get('foo', 'FooController@foo');

Route::get('/', function () {
//    Cache::put('foo', 'bar', 10);
//    vd(Cache::get('foo'));
    return 'Home Page';
});

Route::get('tasks', function () {

    $tasks = Cache::remember('users', 1, function () {
        return \App\Task::all();
    });

    return $tasks;
});

Route::resource('articles', 'ArticlesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('tags/{tags}', 'TagsController@show');

//Route::get('foo', ['middleware' => 'manager', function () {
//    vd('Only For Team Managers');
//}]);

Route::resource('lessons', 'LessonsController');
Route::resource('episodes', 'EpisodesController');
Route::get('all', 'PagesController@all');

Route::get('users', function(){
    return 'all users';
});


Route::get('users/{id}', function ($id) {
    try {
        $user = User::findOrThrow($id);
    } catch (\App\Exceptions\ModelNotFoundException $e){
        echo 123;
    }

    return $user;
});

