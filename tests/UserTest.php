<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    // public function testNotifyUserReturnsTrue()
    // {
    //     $mailer = $this->createMock(Mailer::class);
    //     $mailer->expects($this->once())->method('sendMessage')->willReturn(true);
    //     $user = new User('john.doe@example.com');
    //     $user->setMailer($mailer);

    //     $this->assertTrue($user->notify('Hello'));
    // }

    // public function testNotifyUserReturnsTrue()
    // {
    //     $user = new User('john.doe@example.com');
    //     $user->setMailerCallable(function () {
    //         return true;
    //     });

    //     $this->assertTrue($user->notify('Hello'));
    // }

    public function testNotifyUserReturnsTrue()
    {
        $user = new User('john.doe@example.com');
        $mailer = Mockery::mock('alias:Mailer');
        $mailer->shouldReceive('sendMessage')->once()->with($user->email, 'Hello')->andReturn(true);

        $this->assertTrue($user->notify('Hello'));
    }
}