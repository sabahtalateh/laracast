<?php

namespace App\Statuses;

use App\Users\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'status_id',
        'body'
    ];

    public static function leave(Comment $comment)
    {
        return new static([
            'body' => $comment->body,
            'status_id' => $comment->status_id
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
