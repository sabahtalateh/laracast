<?php

namespace App\Users;

/**
 * Class UserRepository
 * @package App\Users
 */
class UserRepository
{
    /**
     * @param User $user
     */
    public function save(User $user)
    {
        $user->save();
    }

    /**
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    /**
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with(['statuses' => function ($query) {
            $query->latest();
        }])->where('username', $username)->first();
    }
}