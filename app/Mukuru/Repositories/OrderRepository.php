<?php

namespace Mukuru\Repositories;

use Mukuru\Models\Order;

abstract class OrderRepository
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function save()
    {
        return $this->order->save();
    }

}