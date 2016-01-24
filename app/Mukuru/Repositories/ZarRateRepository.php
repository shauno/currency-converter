<?php

namespace Mukuru\Repositories;

use Mukuru\Interfaces\RateRepositoryInterface;

class ZarRateRepository extends RateRepository implements RateRepositoryInterface
{
    public function getSurcharge($usd)
    {
        return $usd * 0.075;
    }
}
