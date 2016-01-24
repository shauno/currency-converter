<?php

namespace Mukuru\Repositories;

use Mukuru\Interfaces\RateRepositoryInterface;

class GbpRateRepository extends RateRepository implements RateRepositoryInterface
{
    public function getSurcharge($usd)
    {
        return 0.05 * $usd;
    }

}