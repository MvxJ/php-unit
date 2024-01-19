<?php

class Mailer
{
    public static function sendMessage($email, $message)
    {
        if (empty($email)) {
            throw new InvalidArgumentException('Empty Email');
        }

        sleep(3);

        echo "send '$message' to '$email'";

        return true;
    }

    // public function sendMessage($email, $message)
    // {
    //     if (empty($email)) {
    //         throw new InvalidArgumentException('Empty Email');
    //     }

    //     sleep(3);

    //     echo "send '$message' to '$email'";

    //     return true;
    // }
}