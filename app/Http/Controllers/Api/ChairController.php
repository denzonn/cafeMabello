<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChairNumber;
use Illuminate\Http\Request;

class ChairController extends BaseController
{
    public function index(){
        $data = ChairNumber::all();

        return $this->sendResponse($data, 'Success Get Data');
    }
}
