<?php

namespace Mukuru\Repositories;

use Mukuru\Interfaces\OrderRepositoryInterface;

class KesOrderRepository extends OrderRepository implements OrderRepositoryInterface
{
    public function postSave()
    {
        return true;
    }
}