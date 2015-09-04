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

class Fooo
{
    public $barr;
    public $bazz;

    function __construct($barr, $bazz)
    {
        $this->barr = $barr;
        $this->bazz = $bazz;
    }
}

class Barr
{
}

class Bazz
{
}


Route::get('/', function () {



    dd(App::make('Fooo'));
});
