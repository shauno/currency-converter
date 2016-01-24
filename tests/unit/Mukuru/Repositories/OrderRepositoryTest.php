<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

Use Mockery as m;

class OrderRepositoryTest extends TestCase
{
    public function test_abstract_save_calls_model_save()
    {
        $order = m::mock('\Mukuru\Models\Order')
            ->shouldReceive('save')
            ->andReturn(true)
            ->getMock();

        //Can't instantiate abstract class, but this extends it
        $repo = new \Mukuru\Repositories\ZarOrderRepository($order);

        $this->assertTrue($repo->save());
    }

}
