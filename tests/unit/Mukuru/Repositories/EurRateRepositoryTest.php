<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EurRateRepositoryTest extends TestCase
{
    public function test_a_5_percent_surcharge_is_returned()
    {
        $rate = new \Mukuru\Models\Rate();

        $repo = new \Mukuru\Repositories\EurRateRepository($rate, 'EUR');

        $this->assertEquals(5.00, $repo->getSurcharge(100));
    }
}
