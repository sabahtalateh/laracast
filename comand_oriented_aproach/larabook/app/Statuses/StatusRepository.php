<?php

namespace App\Statuses;


use App\Users\User;

class StatusRepository
{
    public function save(Status $status, User $user)
    {
        return $user->statuses()->save($status);
    }

    public function getAllForUser($user)
    {
        return $user->statuses()->with('user')->latest()->get();
    }
}