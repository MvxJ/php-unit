<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAddReturnsCorrectSum()
    {
        require 'functions.php';

        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(8, add(6, 2));
    }

    public function testAddNotReturnIncorrectSum()
    {
        $this->assertNotEquals(5, add(2, 2));
    }
}