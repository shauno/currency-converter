<?php

namespace Mukuru\Repositories;

use Mukuru\Interfaces\OrderRepositoryInterface;

class EurOrderRepository extends OrderRepository implements OrderRepositoryInterface
{
    public function postSave()
    {
        $this->order->amount_discount = round($this->order->amount_total * 0.02, 2);

        $this->order->amount_total = $this->order->amount_total - $this->order->amount_discount;

        $this->order->save();

        return true;
    }
}
