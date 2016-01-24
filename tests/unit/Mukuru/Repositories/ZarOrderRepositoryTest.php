<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ZarOrderRepositoryTest extends TestCase
{
    public function test_postSave_returns_true()
    {
        $order = new \Mukuru\Models\Order();

        $repo = new \Mukuru\Repositories\ZarOrderRepository($order);

        $this->assertTrue($repo->postSave());
    }

}
