<?php

namespace App\Http\Controllers;

use App\Services\Umkm\UmkmManager;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    private $umkm;
    public function __construct(UmkmManager $umkm)
    {
        $this->umkm = $umkm;
    }

    public function getList(Request $request) {
        $user = $request->user();
        // $unauthorizedResponse = $this->authorizeUser($request);
        // if ($unauthorizedResponse) {
        //     return $unauthorizedResponse;
        // }

        $result = $this->umkm->getList();
        return $this->apiResponse($result, 'Data fetched successfully');
    }
}
