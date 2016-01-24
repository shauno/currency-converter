<?php

namespace Mukuru\Repositories;

use Mukuru\Interfaces\RateRepositoryInterface;

class KesRateRepository extends RateRepository implements RateRepositoryInterface
{
    public function getSurcharge($usd)
    {
        return $usd * 0.025;
    }

}