<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KesRateRepositoryTest extends TestCase
{
    public function test_a_5_percent_surcharge_is_returned()
    {
        $rate = new \Mukuru\Models\Rate();

        $repo = new \Mukuru\Repositories\KesRateRepository($rate, 'KES');

        $this->assertEquals(2.50, $repo->getSurcharge(100));
    }
}
