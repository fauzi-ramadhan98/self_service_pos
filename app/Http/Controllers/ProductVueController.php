<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductVueController extends Controller
{
    public function index(){
        $product = Product::get();
        return view('product.index_vue', compact('product'));
    }
}
