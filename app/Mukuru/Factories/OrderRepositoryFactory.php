<?php

namespace Mukuru\Factories;

class OrderRepositoryFactory
{
    public function create($currency)
    {
        $class = '\\Mukuru\\Repositories\\'.ucfirst(strtolower($currency)).'OrderRepository';

        if (class_exists($class)) {
            return \App::make($class);
        } else {
            return false;
        }
    }
}
