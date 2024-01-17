<?php

// use Mockery\Adapter\Phpunit\MockeryTestCase;
use PHPUnit\Framework\TestCase;

// class OrderTest extends MockeryTestCase
class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    // public function testOrderIsProcessed()
    // {
    //     $gateway = $this->getMockBuilder('PaymentGateway')
    //                     ->onlyMethods(['charge'])
    //                     ->getMock();
        
    //     $gateway->expects($this->once())
    //             ->method('charge')
    //             ->with($this->equalTo(200))
    //             ->willReturn(true);
        
    //     $order = new Order($gateway);

    //     $order->amount = 200;
        
    //     $this->assertTrue($order->process());
    // }

    // public function testOrderIsProcessedMockery()
    // {
    //     $gateway = Mockery::mock('PaymentGateway');
    //     $gateway->shouldReceive('charge')->once()->with(200)->andReturn(true);

    //     $order = new Order($gateway);
    //     $order->amount = 200;
        
    //     $this->assertTrue($order->process());
    // }

    public function testOrderIsProcessedUsingMock()
    {
        $order = new Order(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gatewayMock = Mockery::mock('PaymentGateway');
        $gatewayMock->shouldReceive('charge')->once()->with(5.97);

        $order->process($gatewayMock);
    }

    public function testOrderIsProcessedUsingSpies()
    {
        $order = new Order(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gatewaySpy = Mockery::spy('PaymentGateway');

        $order->process($gatewaySpy);

        $gatewaySpy->shouldHaveReceived('charge')->once()->with(5.97);
    }
}