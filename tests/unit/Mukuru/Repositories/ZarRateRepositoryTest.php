<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ZarRateRepositoryTest extends TestCase
{
    public function test_a_5_percent_surcharge_is_returned()
    {
        $rate = new \Mukuru\Models\Rate();

        $repo = new \Mukuru\Repositories\ZarRateRepository($rate, 'ZAR');

        $this->assertEquals(7.50, $repo->getSurcharge(100));
    }
}
