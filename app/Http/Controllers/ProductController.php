<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = product::with(['category','images'])->paginate(16);
        $currencycode = env("CURRENCY_CODE", "$");
        return $products;
    }
}
