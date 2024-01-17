<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;

    protected function setUp(): void
    {
        static::$queue->clear();
    }

    // protected function tearDown(): void
    // {
    //     unset($this->queue);
    // }

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }


    public function testItemIsAddedToQueue()
    {
        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());
    }


    public function testItemIsRemovedFromQueue()
    {
        static::$queue->push('green');
        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function testItemIsRemovedFromBeginingOfQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');

        $item = static::$queue->pop();

        $this->assertEquals('first', $item);
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }


    public function testExceptionThrownWhenAddingAnItemOutOfLimit()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }
        
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full!');
        static::$queue->push('over-limit');
    }

    // public function testNewQueueIsEmpty()
    // {
    //     $queue = new Queue;

    //     $this->assertEquals(0, $queue->getCount());

    //     return $queue;
    // }

    // /**
    //  * @depends testNewQueueIsEmpty
    //  */
    // public function testItemIsAddedToQueue(Queue $queue)
    // {
    //     $queue->push('green');

    //     $this->assertEquals(1, $queue->getCount());

    //     return $queue;
    // }


    // /**
    //  * @depends testItemIsAddedToQueue
    //  */
    // public function testItemIsRemovedFromQueue(Queue $queue)
    // {
    //     $item = $queue->pop();

    //     $this->assertEquals(0, $queue->getCount());
    //     $this->assertEquals('green', $item);
    // }
}