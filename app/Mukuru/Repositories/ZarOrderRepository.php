<?php

namespace Mukuru\Repositories;

use Mukuru\Interfaces\OrderRepositoryInterface;

class ZarOrderRepository extends OrderRepository implements OrderRepositoryInterface
{
    public function postSave()
    {
        return;
    }
}