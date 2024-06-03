<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function index(){
        $data = Category::all();

        return $this->sendResponse($data, 'Success Get Data');
    }
}
