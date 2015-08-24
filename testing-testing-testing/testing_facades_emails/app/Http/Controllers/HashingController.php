<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

/**
 * Class HashingController
 * @package App\Http\Controllers
 */
class HashingController extends Controller
{
    /**
     * @var
     */
    protected $hasher;
    /**
     * @var
     */
    protected $request;

    /**
     * @param Hasher $hasher
     * @param Request $request
     */
    function __construct(Hasher $hasher, Request $request)
    {
        $this->hasher = $hasher;
        $this->request = $request;
    }


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('hash.index');
    }

    /**
     *
     */
    public function postIndex()
    {
        $hashedPassword = $this->hasher->make($this->request->get('password'));
        return "Your hash is {$hashedPassword}";
    }
}
