<?php

namespace App\Mailers;


use App\Users\User;
use Illuminate\Contracts\Mail\Mailer as Mail;

abstract class Mailer
{
    /**
     * @var Mail
     */
    private $mail;

    function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param User $user
     * @param $subject
     * @param $view
     * @param $data
     */
    public function sendTo(User $user, $subject, $view, $data = [])
    {
        $this->mail->send($view, $data, function ($message) use ($user, $subject) {
            $message->to($user->email)->subject($subject);
        });
    }
}