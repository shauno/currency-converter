<?php

namespace Mukuru\Repositories;

use Mukuru\Models\Rate;

abstract class RateRepository
{
    public $rate;

    public function __construct(Rate $rate, $abbr)
    {
        $this->rate = $rate->where('to', '=', $abbr)->first();
    }
}
