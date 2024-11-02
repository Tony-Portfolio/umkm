<?php

namespace App\Services\testing;

class testingService implements Contract
{
    public function testing() {
        $result = [
            'id'                 => "Hi",
        ];
        return $result;
    }
}