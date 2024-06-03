<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Topping;
use Illuminate\Http\Request;

class ToppingController extends BaseController
{
    public function index(){
        $data = Topping::all();

        return $this->sendResponse($data, 'Success Get Data');
    }
}
