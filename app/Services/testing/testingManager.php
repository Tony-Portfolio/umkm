<?php

namespace App\Services\testing;

use Illuminate\Support\Manager;

class testingManager extends Manager
{
    public function getDefaultDriver()
    {
        return 'testing';
    }

    public function createtestingDriver(): Contract
    {
        return new testingService();
    }
}