<?php

namespace Mukuru\Interfaces;

interface OrderRepositoryInterface {
    public function save();

    public function postSave();
}