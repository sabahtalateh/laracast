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
        return User::with('statuses')->where('username', $username)->first();
    }

    /**
     * Find a user by their id
     *
     * @param $id
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function fallow(User $userToFallow, User $fallower)
    {
        return $fallower->fallowedUsers()->attach($userToFallow);
    }

    public function unfallow(User $userToUnfallow, User $unfallower)
    {
        return $unfallower->fallowedUsers()->detach($userToUnfallow);
    }
}