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

    /**
     * Get the feed for a user.
     *
     * @param User $user
     * @return mixed
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->fallowedUsers()->lists('fallowed_id');
        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
    }

    public function leaveComment(Comment $comment)
    {
        $userId = $comment->user_id;
        $comment = Comment::leave($comment);

        User::findOrFail($userId)->comments()->save($comment);

        return $comment;
    }
}