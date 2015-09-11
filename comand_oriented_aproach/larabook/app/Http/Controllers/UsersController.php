<?php

namespace App\Http\Controllers;

use App\Users\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param UserRepository $usersRepository
     * @return Response
     */
    public function index(UserRepository $usersRepository)
    {
        $users = $usersRepository->getPaginated();

        return view('users.index')->withUsers($users);
    }

    public function show(UserRepository $usersRepository, $username)
    {
        $user = $usersRepository->findByUsername($username);

        return view('users.show')->withUser($user);
    }
}
