<?php

namespace Mukuru\Repositories;

use Mukuru\Interfaces\RateRepositoryInterface;

class EurRateRepository extends RateRepository implements RateRepositoryInterface
{
    public function getSurcharge($usd)
    {
        return 0.05 * $usd;
    }
}
