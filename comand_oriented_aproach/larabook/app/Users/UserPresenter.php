<?php
namespace App\Users;

use Laracasts\Presenter\Presenter;

/**
 * Class UserPresenter
 * @package App\Users
 */
class UserPresenter extends Presenter
{
    /**
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);
        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }
}