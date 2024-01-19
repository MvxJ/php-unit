<?php

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendMethodReturnsTrue()
    {
        $this->assertTrue(Mailer::sendMessage('john.doe@example.com', 'Hello World!'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);

        Mailer::sendMessage('', 'Hello World!');
    }
}