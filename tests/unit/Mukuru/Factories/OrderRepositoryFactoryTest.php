<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderRepositoryFactoryTest extends TestCase
{
    public function test_factory_returns_false_for_nonexistent_currency()
    {
        $factory = new \Mukuru\Factories\OrderRepositoryFactory();

        $return = $factory->create('MIA');

        $this->assertFalse($return);
    }

    public function test_factory_returns_implementation_of_OrderRepositoryInterface()
    {
        $factory = new \Mukuru\Factories\OrderRepositoryFactory();

        $return = $factory->create('ZAR');

        $this->assertInstanceOf('\Mukuru\Interfaces\OrderRepositoryInterface', $return);
    }
}
