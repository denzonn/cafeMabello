<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index(){
        $data = Product::with(['category'])->get();

        return $this->sendResponse($data, 'Success Get Data');
    }
}
