<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EurOrderRepositoryTest extends TestCase
{
    public function test_postSave_applies_2_percent_discount_off_total()
    {
        $order = new \Mukuru\Models\Order();
        $order->fill([
            'amount_total' => 100,
            'amount_discount' => 0
        ]);
        $repo = new \Mukuru\Repositories\EurOrderRepository($order);

        $repo->postSave();

        $this->assertEquals(98.00, $repo->order->amount_total);
        $this->assertEquals(2.00, $repo->order->amount_discount);
    }
}
