<?php

namespace App\Users;

use App\Statuses\Status;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laracasts\Presenter\PresentableTrait;

/**
 * App\User
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Users\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Users\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Users\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Users\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Users\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Users\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Users\User whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|Status[] $statuses
 */
class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, PresentableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $presenter = UserPresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function register($username, $email, $password)
    {
        $user = $this->fill(compact('username', 'email', 'password'));

        return $user;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function is($user)
    {
        if (is_null($user)) {
            return false;
        }

        return $this->username == $user->username;
    }
}
