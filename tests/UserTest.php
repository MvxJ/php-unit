<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User;
        $user->firstName = 'John';
        $user->surname = 'Doe';

        $this->assertEquals('John Doe', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */
    public function userHasFirstName()
    {
        $user = new User;
        $user->firstName = 'John';

        $this->assertEquals('John', $user->firstName);
    }

    public function testNotificationIsSend()
    {
        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('john.doe@example.com'), $this->equalTo('Hello John'))
            ->willReturn(true);

        $user = new User;
        $user->email = 'john.doe@example.com';
        $user->setMailer($mockMailer);

        $this->assertTrue($user->notify('Hello John'));
    }

    public function testNotifyUserWithNoEmail()
    {
        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->onlyMethods([])
            ->getMock();

        $user = new User;
        $user->setMailer($mockMailer);

        $this->expectException(Exception::class);

        $user->notify("Hello!");
        
    }
}