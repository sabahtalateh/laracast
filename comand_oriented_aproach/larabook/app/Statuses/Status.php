<?php

namespace App\Statuses;

use App\Events\StatusWasPublished;
use App\Statuses\StatusPresenter;
use App\Users\User;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

/**
 * App\Statuses\Status
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Statuses\Status whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Statuses\Status whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Statuses\Status whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Statuses\Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Statuses\Status whereUpdatedAt($value)
 */
class Status extends Model
{
    use PresentableTrait;

    protected $presenter = StatusPresenter::class;

    protected $fillable = [
        'body'
    ];

    public function publish($body, Dispatcher $event)
    {
        $status = new static(compact('body'));
        $event->fire(new StatusWasPublished($body));

        return $status;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
