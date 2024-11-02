<?php

namespace App\Services\Umkm;

use Illuminate\Support\Manager;

class UmkmManager extends Manager
{
    public function getDefaultDriver()
    {
        return 'Umkm';
    }

    public function createUmkmDriver(): Contract
    {
        return new UmkmService();
    }
}