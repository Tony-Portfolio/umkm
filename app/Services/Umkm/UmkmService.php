<?php

namespace App\Services\Umkm;

use App\Models\Umkm;

class UmkmService implements Contract
{
    public function getList() {
        $result = Umkm::get();
        return $result;
    }
}