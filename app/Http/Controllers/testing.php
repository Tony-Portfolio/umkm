<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\testing\testingManager;

class testing extends Controller
{
    private $testing;
    public function __construct(testingManager $testing)
    {
        $this->testing = $testing;
    }

    public function initial(Request $request) {
        $result = $this->testing->testing();
        return $this->apiResponse($result, 'Data fetched successfully');
    }
}
