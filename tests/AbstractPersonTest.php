<?php

use App\AbstractPerson;
use App\Doctor;
use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
    public function testTitleAndSurnameIsReturned()
    {
        $doctor = new Doctor('Doe');

        $this->assertEquals('Dr.Doe', $doctor->getTitleAndSurname());
    }

    public function testNameAndTitleIncudesValueFromGetTitle()
    {
        $mock = $this->getMockBuilder(AbstractPerson::class)
            ->setConstructorArgs(['Doe'])
            ->getMockForAbstractClass();

        $mock->method('getTitle')->willReturn('Dr.');

        $this->assertEquals('Dr.Doe', $mock->getTitleAndSurname());
    }
}