<?php

namespace App\Users;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait FallowableTrait
{
    /**
     * Get the list of users that the current user fallows
     *
     * @return BelongsToMany
     */
    public function fallowedUsers()
    {
        return $this->belongsToMany(static::class, 'fallows', 'fallower_id', 'fallowed_id')
            ->withTimestamps();
    }

    /**
     * Get the list of users who fallow the current user
     *
     * @return BelongsToMany
     */
    public function fallowers()
    {
        return $this->belongsToMany(static::class, 'fallows', 'fallowed_id', 'fallower_id')
            ->withTimestamps();
    }

    /**
     * Determine if the current user fallows other user
     *
     * @param User $otherUser
     * @return bool
     */
    public function isFallowedBy(User $otherUser)
    {
        $idsWhoOtherUserFallows = $otherUser->fallowedUsers()->lists('fallowed_id');

        return in_array($this->id, $idsWhoOtherUserFallows->toArray());
    }
}