<?php

namespace Mukuru\Factories;

use Mukuru\Models\Rate;

class RateRepositoryFactory
{
    public function create($currency)
    {
        $class = '\\Mukuru\\Repositories\\'.ucfirst(strtolower($currency)).'RateRepository';

        if(class_exists($class)) {
            return new $class(new Rate(), $currency);
        }else{
            return false;
        }
    }
}