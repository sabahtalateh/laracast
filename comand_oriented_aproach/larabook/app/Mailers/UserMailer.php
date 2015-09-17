<?php

namespace App\Mailers;


use App\Users\User;

class UserMailer extends Mailer
{
    public function sendWelcomeMessageTo(User $user)
    {
        $subject = "Welcome to Larabook";
        $view = 'emails.registration.confirm';
        $data = [];

        $this->sendTo($user,$subject, $view);
    }
}