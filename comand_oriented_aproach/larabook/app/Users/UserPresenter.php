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

    public function fallowerCount()
    {
        $count = $this->entity->fallowers()->count();
        $plural = str_plural('Fallower', $count);

        return "{$count} {$plural}";
    }

    public function statusCount()
    {
        $count = $this->entity->statuses()->count();
        $plural = str_plural('Status', $count);

        return "{$count} {$plural}";
    }
}