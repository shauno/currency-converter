<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RateRepositoryFactoryTest extends TestCase
{
    public function test_factory_returns_false_for_nonexistent_currency()
    {
        $factory = new \Mukuru\Factories\RateRepositoryFactory();

        $return = $factory->create('MIA');

        $this->assertFalse($return);
    }

    public function test_factory_returns_implementation_of_RateRepositoryInterface()
    {
        $factory = new \Mukuru\Factories\RateRepositoryFactory();

        $return = $factory->create('ZAR');

        $this->assertInstanceOf('\Mukuru\Interfaces\RateRepositoryInterface', $return);
    }
}
