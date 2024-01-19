<?php

class User
{
    public $email;

    protected $mailer;

    protected $mailerCallable;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function setMailerCallable(callable $mailerCallable)
    {
        $this->mailerCallable = $mailerCallable;
    }

    public function notify($message)
    {
        return Mailer::sendMessage($this->email, $message);
    }

    // public function notify($message)
    // {
    //     return $this->mailer->sendMessage($this->email, $message);
    // }

    // public function notify($message)
    // {
    //     return call_user_func($this->mailerCallable, $this->email, $message);
    // }
}