<?php

class User
{
    public $firstName;

    public $surname;

    public $email;
    
    protected $mailer;


    public function setMailer(Mailer $mailer): void
    {
        $this->mailer = $mailer;
    }

    public function getFullName(): string
    {
        return trim("$this->firstName $this->surname");
    }

    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}