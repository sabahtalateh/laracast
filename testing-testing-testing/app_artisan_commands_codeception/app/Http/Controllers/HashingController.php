<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class HashingController extends Controller
{
    public function index()
    {
        return view('hash.index');
    }

    public function postIndex()
    {
        $hashedPassword = Hash::make(Input::get('password'));

        return "Your hash is {$hashedPassword}";
    }
}
